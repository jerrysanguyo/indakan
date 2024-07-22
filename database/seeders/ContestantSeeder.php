<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contestant;
use App\Models\Category;
use App\Models\Dance;
use App\Models\User;

class ContestantSeeder extends Seeder
{
    public function run(): void
    {
        $contestants = [
            // Category: BARRIO DANCES
            ['folk_dance_id' => 1, 'dance_id' => 1, 'barangay' => 'TUKTUKAN', 'name' => 'ALMA PAULINO', 'no_of_members' => 23, 'focal_person' => 'ALMA PAULINO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 2, 'barangay' => 'EAST REMBO', 'name' => 'RODE ALIÑO', 'no_of_members' => 30, 'focal_person' => 'RODE ALIÑO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 2, 'barangay' => 'IBAYO', 'name' => 'KAG. OCTAVIO ESTACIO', 'no_of_members' => 40, 'focal_person' => 'KAG. OCTAVIO ESTACIO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 3, 'barangay' => 'KATUPARAN', 'name' => 'KAG. VERNA CADIA', 'no_of_members' => 35, 'focal_person' => 'KAG. VERNA CADIA', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 4, 'barangay' => 'NORTH SIGNAL', 'name' => 'TRISH UNIGO', 'no_of_members' => 40, 'focal_person' => 'TRISH UNIGO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 5, 'barangay' => 'PINAGSAMA', 'name' => 'JOPAY MORTEL', 'no_of_members' => 50, 'focal_person' => 'JOPAY MORTEL', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 6, 'barangay' => 'RIZAL', 'name' => 'KAG. HECTOR SANTOS', 'no_of_members' => 30, 'focal_person' => 'KAG. HECTOR SANTOS', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 7, 'barangay' => 'STA. ANA', 'name' => 'SEC ARWIN F. ABELLA', 'no_of_members' => 40, 'focal_person' => 'SEC ARWIN F. ABELLA', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 1, 'dance_id' => 7, 'barangay' => 'USUSAN', 'name' => 'FRANCIS F. GUILING', 'no_of_members' => 20, 'focal_person' => 'FRANCIS F. GUILING', 'added_by' => 1, 'updated_by' => 1],
            // Category: CORDILLERA
            ['folk_dance_id' => 2, 'dance_id' => 8, 'barangay' => 'WAWA', 'name' => 'KAG. MANNY LIWANAG', 'no_of_members' => 30, 'focal_person' => 'KAG. MANNY LIWANAG', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 9, 'barangay' => 'CENTRAL SIGNAL', 'name' => 'KAG. PAUL LLANTO', 'no_of_members' => 50, 'focal_person' => 'KAG. PAUL LLANTO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 10, 'barangay' => 'FORT BONIFACIO', 'name' => 'KAG. MARICRIS PALMA', 'no_of_members' => 30, 'focal_person' => 'KAG. MARICRIS PALMA', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 8, 'barangay' => 'LIGID TIPAS', 'name' => 'MS. CLAIRE LOIS ATIENZA', 'no_of_members' => 20, 'focal_person' => 'MS. CLAIRE LOIS ATIENZA', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 11, 'barangay' => 'LOWER BICUTAN', 'name' => 'ROGENT P. CALIGDONG', 'no_of_members' => 40, 'focal_person' => 'ROGENT P. CALIGDONG', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 8, 'barangay' => 'NORTH DAANG HARI', 'name' => 'MR. BEN MARION PARRO', 'no_of_members' => 45, 'focal_person' => 'MR. BEN MARION PARRO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 12, 'barangay' => 'PALINGON', 'name' => 'MS. MARILYN EVANGELISTA', 'no_of_members' => 20, 'focal_person' => 'MS. MARILYN EVANGELISTA', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 13, 'barangay' => 'PEMBO', 'name' => 'KAG. ROSALYN LAPASARAN', 'no_of_members' => 50, 'focal_person' => 'KAG. ROSALYN LAPASARAN', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 2, 'dance_id' => 12, 'barangay' => 'WESTERN BICUTAN', 'name' => 'MR. DAVID HANS MARTINEZ', 'no_of_members' => 35, 'focal_person' => 'MR. DAVID HANS MARTINEZ', 'added_by' => 1, 'updated_by' => 1],
            // Category: MINDANAO
            ['folk_dance_id' => 3, 'dance_id' => 14, 'barangay' => 'BAGUMBAYAN', 'name' => 'MS. NATALIE FAE PAGKALINAWAN', 'no_of_members' => 30, 'focal_person' => 'MS. NATALIE FAE PAGKALINAWAN', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 15, 'barangay' => 'BAMBANG', 'name' => 'CARL ANTHON ORTEGA', 'no_of_members' => 24, 'focal_person' => 'CARL ANTHON ORTEGA', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 16, 'barangay' => 'CALZADA', 'name' => 'KAG. REMY ENCANTO', 'no_of_members' => 30, 'focal_person' => 'KAG. REMY ENCANTO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 17, 'barangay' => 'CENTRAL BICUTAN', 'name' => 'KAG. IYA BALMORI', 'no_of_members' => 30, 'focal_person' => 'KAG. IYA BALMORI', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 18, 'barangay' => 'COMEMBO', 'name' => 'MARYLOU BAUL/ VIVIAN PAYOYO', 'no_of_members' => 30, 'focal_person' => 'MARYLOU BAUL/ VIVIAN PAYOYO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 18, 'barangay' => 'NEW LOWER BICUTAN', 'name' => 'JOHN ACORIN FERMIN', 'no_of_members' => 47, 'focal_person' => 'JOHN ACORIN FERMIN', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 19, 'barangay' => 'POST PROPER SOUTH SIDE', 'name' => 'CAMID AMOTO/ JOHN REY LAMAR', 'no_of_members' => 50, 'focal_person' => 'CAMID AMOTO/ JOHN REY LAMAR', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 3, 'dance_id' => 20, 'barangay' => 'WEST REMBO', 'name' => 'KAG. JOEL REYES ADVINCULA', 'no_of_members' => 20, 'focal_person' => 'KAG. JOEL REYES ADVINCULA', 'added_by' => 1, 'updated_by' => 1],
            // Category: SPANISH INFLUENCE
            ['folk_dance_id' => 4, 'dance_id' => 21, 'barangay' => 'NAPINDAN', 'name' => 'KAG. RODELIO BERNARDO/ BIBOY BERNARDO', 'no_of_members' => 40, 'focal_person' => 'KAG. RODELIO BERNARDO/ BIBOY BERNARDO', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 22, 'barangay' => 'PITOGO', 'name' => 'SEC JERRY PANERIO JR.', 'no_of_members' => 20, 'focal_person' => 'SEC JERRY PANERIO JR.', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 23, 'barangay' => 'POST PROPER NORTH SIDE', 'name' => 'MR. ERICSON PASADILLA/ ANTONIO CAPATOY', 'no_of_members' => 20, 'focal_person' => 'MR. ERICSON PASADILLA/ ANTONIO CAPATOY', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 24, 'barangay' => 'SAN MIGUEL', 'name' => 'THES CRUZ', 'no_of_members' => 20, 'focal_person' => 'THES CRUZ', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 25, 'barangay' => 'SOUTH DAANG HARI', 'name' => 'KAP. BENJIE HERNANDEZ', 'no_of_members' => 20, 'focal_person' => 'KAP. BENJIE HERNANDEZ', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 22, 'barangay' => 'SOUTH SIGNAL', 'name' => 'MIKEE LORAINNE VILLAFLORES/ JOHN MICHAEL REYES', 'no_of_members' => 40, 'focal_person' => 'MIKEE LORAINNE VILLAFLORES/ JOHN MICHAEL REYES', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 26, 'barangay' => 'TANYAG', 'name' => 'KAG. EDGARDO B. LIONGCO JR.', 'no_of_members' => 50, 'focal_person' => 'KAG. EDGARDO B. LIONGCO JR.', 'added_by' => 1, 'updated_by' => 1],
            ['folk_dance_id' => 4, 'dance_id' => 26, 'barangay' => 'UPPER BICUTAN', 'name' => 'MR. FERDINAND C. PAGUILA', 'no_of_members' => 24, 'focal_person' => 'MR. FERDINAND C. PAGUILA', 'added_by' => 1, 'updated_by' => 1]
        ];

        foreach ($contestants as $contestant) {
            Contestant::create($contestant);
        }
    }
}
