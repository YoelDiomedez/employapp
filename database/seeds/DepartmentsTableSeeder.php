<?php

use App\Department;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Departamentos del Perú 2019
        $ama = Department::create(['name' => 'AMAZONAS']);
        $anc = Department::create(['name' => 'ANCASH']);
        $apu = Department::create(['name' => 'APURIMAC']);
        $are = Department::create(['name' => 'AREQUIPA']);  
        $aya = Department::create(['name' => 'AYACUCHO']);
        $caj = Department::create(['name' => 'CAJAMARCA']);
        $cal = Department::create(['name' => 'CALLAO']);
        $cus = Department::create(['name' => 'CUSCO']);
        $huv = Department::create(['name' => 'HUANCAVELICA']);
        $huc = Department::create(['name' => 'HUÁNUCO']);
        $ica = Department::create(['name' => 'ICA']);
        $jun = Department::create(['name' => 'JUNÍN']);
        $lal = Department::create(['name' => 'LA LIBERTAD']);
        $lam = Department::create(['name' => 'LAMBAYEQUE']);
        $lim = Department::create(['name' => 'LIMA']);
        $lor = Department::create(['name' => 'LORETO']);
        $mdd = Department::create(['name' => 'MADRE DE DIOS']);
        $moq = Department::create(['name' => 'MOQUEGUA']);
        $pas = Department::create(['name' => 'PASCO']);
        $piu = Department::create(['name' => 'PIURA']);
        $pun = Department::create(['name' => 'PUNO']);
        $sam = Department::create(['name' => 'SAN MARTÍN']);
        $tac = Department::create(['name' => 'TACNA']);
        $tum = Department::create(['name' => 'TUMBES']);
        $uca = Department::create(['name' => 'UCAYALI']);

        $are->provinces()->sync([ 1,  2,  3,  4,  5,  6,  7,  8]); 
        
        $ama->provinces()->sync([ 9, 10, 11, 12, 13, 14, 15]);

        $anc->provinces()->sync([16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35]);

        $aya->provinces()->sync([36, 37, 38, 39, 40, 41, 42]); 

        $apu->provinces()->sync([43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53]);

        $caj->provinces()->sync([54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66]);

        $cal->provinces()->sync([67]);

        $cus->provinces()->sync([68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80]);

        $huv->provinces()->sync([81, 82, 83, 84, 85, 86, 87]);

        $huc->provinces()->sync([89, 90, 91, 92, 93, 94, 95, 96, 97, 98]);

        $ica->provinces()->sync([99, 100, 101, 102, 103]);

        $jun->provinces()->sync([104, 105, 106, 107, 108, 109, 110, 111, 112]);

        $lal->provinces()->sync([113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124]);

        $lam->provinces()->sync([125, 126, 127]);

        $lim->provinces()->sync([128, 129, 130, 131, 132, 133, 134, 135, 136, 137]);

        $lor->provinces()->sync([138, 139, 140, 141, 142, 143, 144, 145]);

        $mdd->provinces()->sync([146, 147, 148]);

        $moq->provinces()->sync([149, 150, 151]);

        $pas->provinces()->sync([152, 153, 154]);

        $piu->provinces()->sync([155, 156, 157, 158, 159, 160, 161, 162]);

        $pun->provinces()->sync([163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175]);

        $sam->provinces()->sync([176, 177, 178, 179, 170, 181, 182, 183, 184, 185]);

        $tac->provinces()->sync([186, 187, 188, 189]);

        $tum->provinces()->sync([190, 191, 192]);

        $uca->provinces()->sync([193, 194, 195, 196]);
    }
}
