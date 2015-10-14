<?php

use Illuminate\Database\Seeder;
use FairHub\Models\tab_lingue as tl;
use FairHub\Models\Language as L;

class tab_lingue_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tl::create(['lin_id' => 'IT', 'lin_desc' => 'ITALIANO']);
        tl::create(['lin_id' => 'EN', 'lin_desc' => 'INGLESE']);
        tl::create(['lin_id' => 'SP', 'lin_desc' => 'SPAGNOLO']);
        tl::create(['lin_id' => 'DE', 'lin_desc' => 'TEDESCO']);
        tl::create(['lin_id' => 'FR', 'lin_desc' => 'FRANCESE']);

        L::create(['code'=>'sp', 'description'=>'Español']);
        L::create(['code'=>'de', 'description'=>'Deutsch']);
        L::create(['code'=>'fr', 'description'=>'Français']);

    }
}
