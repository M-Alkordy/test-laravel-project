<?php

namespace App\Imports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
class SubscriberImport implements ToCollection, WithHeadingRow
{
    use Importable;
    public function __construct($lid)
    {
        $this->lid=$lid;

    }
    
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            
            
            if (isset($row['email']) && filter_var(strtolower($row['email']), FILTER_VALIDATE_EMAIL)) {
                $testSub = Subscriber::where('email',trim(strtolower($row['email'])))->first();
                if($testSub)
                {
                    
                    $lists = $testSub->lists()->pluck('list_id');
                    $lists[]=$this->lid;
                    $testSub->lists()->sync($lists);
                    if(isset($row['name']))
                    {
                        $testSub->name = $row['name'];
                    }
                    $testSub->save();
                }
                else
                {
                    $sub=new Subscriber();
                    $sub->email=strtolower($row['email']);
                    if(isset($row['name']))
                    {
                        $sub->name = $row['name'];
                    }
                    $sub->save();
                    $sub->lists()->sync([$this->lid]);
                }
                
                
            }

        }

    }
}
