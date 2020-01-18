<?php

use App\Province;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Provincias del Departamento de AREQUIPA
        $arequipa   = Province::create(['name' => 'AREQUIPA']);
        $camana     = Province::create(['name' => 'CAMANÁ']);
        $caraveli   = Province::create(['name' => 'CARAVELÍ']);
        $castilla   = Province::create(['name' => 'CASTILLA']);
        $caylloma   = Province::create(['name' => 'CAYLLOMA']);
        $condesuyos = Province::create(['name' => 'CONDESUYOS']);
        $islay      = Province::create(['name' => 'ISLAY']);
        $launion    = Province::create(['name' => 'LA UNIÓN']);

        $arequipa->districts()->sync([
            1,  2,  3,  4,  5,  6,  7,  8,  9, 10,
           11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
           21, 22, 23, 24, 25, 26, 27, 28, 29
        ]);

        $camana->districts()->sync([30, 31, 32, 33, 34, 35, 36, 37]);

        $caraveli->districts()->sync([38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50]);

        $castilla->districts()->sync([51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64]);

        $caylloma->districts()->sync([
                           65, 66, 67, 68, 69, 70,
           71, 72, 73, 74, 75, 76, 77, 78, 79, 80,
           81, 82, 83, 84
        ]);

        $condesuyos->districts()->sync([85, 86, 87, 88, 89, 90, 91, 92]);

        $islay->districts()->sync([93, 94, 95, 96, 97, 98]);

        $launion->districts()->sync([99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109]);
        
        // Provincias del Departamento de AMAZONAS
        $chachapoyas        = Province::create(['name' => 'CHACHAPOYAS']);
        $bagua              = Province::create(['name' => 'BAGUA']);
        $bongara            = Province::create(['name' => 'BONGARÁ']);
        $condorcanqui       = Province::create(['name' => 'CONDORCANQUI']);
        $luya               = Province::create(['name' => 'LUYA']);
        $rodriguezdemendoza = Province::create(['name' => 'RODRÍGUEZ DE MENDOZA']); 
        $utcubamba          = Province::create(['name' => 'UTCUBAMBA']);

        $chachapoyas->districts()->sync([
            110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 
            120, 121, 122, 123, 124, 125, 126, 127, 128, 129,
            130
        ]);

        $bagua->districts()->sync([131, 132, 133, 134, 135, 136]);

        $bongara->districts()->sync([137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148]);

        $condorcanqui->districts()->sync([149, 150, 151]);

        $luya->districts()->sync([
                      152, 153, 154, 155, 156, 157, 158, 159, 
            160, 161, 162, 163, 164, 165, 166, 167, 168, 169,
            170, 171, 172, 173, 174
        ]);

        $rodriguezdemendoza->districts()->sync([175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186]);
        
        $utcubamba->districts()->sync([187, 188, 189, 190, 191, 192, 193]);

        // Provincias del Departamento de ANCASH
        $aija              = Province::create(['name' => 'AIJA']);
        $antonioraymondi   = Province::create(['name' => 'ANTONIO RAYMONDI']);
        $asuncion          = Province::create(['name' => 'ASUNCIÓN']);
        $bolognesi         = Province::create(['name' => 'BOLOGNESI']);
        $carhuaz           = Province::create(['name' => 'CARHUAZ']);
        $carlosff          = Province::create(['name' => 'CARLOS FERMÍN FITZCARRALD']);
        $casma             = Province::create(['name' => 'CASMA']);
        $corogo            = Province::create(['name' => 'CORONGO']);
        $huaraz            = Province::create(['name' => 'HUARAZ']);
        $huari             = Province::create(['name' => 'HUARI']);
        $huarmey           = Province::create(['name' => 'HUARMEY']);
        $huaylas           = Province::create(['name' => 'HUAYLAS']);
        $mariscalluzuriaga = Province::create(['name' => 'MARISCAL LUZURIAGA']);
        $ocros             = Province::create(['name' => 'OCROS']);
        $pallasca          = Province::create(['name' => 'PALLASCA']);
        $pomabamba         = Province::create(['name' => 'POMABAMBA']);
        $recuay            = Province::create(['name' => 'RECUAY']);
        $santa             = Province::create(['name' => 'SANTA']);
        $sihuas            = Province::create(['name' => 'SIHUAS']);
        $yungay            = Province::create(['name' => 'YUNGAY']);
        
        $aija->districts()->sync([194, 195, 196, 197, 198]); 

        $antonioraymondi->districts()->sync([199, 200, 201, 202, 203, 204]);

        $asuncion->districts()->sync([205, 206]); 

        $bolognesi->districts()->sync([
                                            207, 208, 209, 
            210, 211, 212, 213, 214, 215, 216, 217, 218, 219,
            220, 221
        ]);

        $carhuaz->districts()->sync([222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232]);

        $carlosff->districts()->sync([233, 234, 235]);

        $casma->districts()->sync([236, 237, 238, 239]);

        $corogo->districts()->sync([240, 241, 242, 243, 244, 245, 246]);

        $huaraz->districts()->sync([247, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257, 258]);

        $huari->districts()->sync([
                                                         259, 
            260, 261, 262, 263, 264, 265, 266, 267, 268, 269,
            270, 271, 272, 273, 274
        ]);

        $huarmey->districts()->sync([275, 276, 277, 278, 279]);

        $huaylas->districts()->sync([280, 281, 282, 283, 284, 285, 286, 287, 288, 289]); 

        $mariscalluzuriaga->districts()->sync([290, 291, 292, 293, 294, 295, 296, 297]);

        $ocros->districts()->sync([299, 300, 301, 302, 303, 304, 305, 306, 307]);

        $pallasca->districts()->sync([308, 309, 310, 311, 312, 313, 314, 315, 316, 317, 318]);

        $pomabamba->districts()->sync([319, 320, 321, 322]);

        $recuay->districts()->sync([323, 324, 325, 326, 327, 328, 329, 330, 331, 332]);

        $santa->districts()->sync([333, 334, 335, 336, 337, 338, 339, 340, 341]);

        $sihuas->districts()->sync([342, 343, 344, 345, 346, 347, 348, 349, 350, 351]);

        $yungay->districts()->sync([352, 353, 354, 355, 356, 357, 358, 359]);

        // Provincias del Departamento de APURIMAC
        $abancay     = Province::create(['name' => 'ABANCAY']);
        $andahuaylas = Province::create(['name' => 'ANDAHUAYLAS']);
        $antabamba   = Province::create(['name' => 'ANTABAMBA']);
        $aymaraes    = Province::create(['name' => 'AYMARAES']);
        $cotabambas  = Province::create(['name' => 'COTABAMBAS']);
        $chincheros  = Province::create(['name' => 'CHINCHEROS']);
        $grau        = Province::create(['name' => 'GRAU']);

        $abancay->districts()->sync([360, 361, 362, 363, 364, 365, 366, 367, 368]);

        $andahuaylas->districts()->sync([
                                                         369, 
            370, 371, 372, 373, 374, 375, 376, 377, 378, 379,
            380, 381, 382, 383, 384, 385, 386, 387, 388
        ]);

        $antabamba->districts()->sync([389, 390, 391, 392, 393, 394, 395]);

        $aymaraes->districts()->sync([
                                          396, 397, 398, 399,
            400, 401, 402, 403, 404, 405, 406, 407, 408, 409,
            410, 411, 412
        ]);

        $cotabambas->districts()->sync([413, 414, 415, 416, 417, 418]);

        $chincheros->districts()->sync([419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429]);

        $grau->districts()->sync([ 
            430, 431, 432, 433, 434, 435, 436, 437, 438, 439,
            440, 441, 442, 443
        ]);

        // Provincias del Departamento de AYACUCHO
        $huamanga      = Province::create(['name' => 'HUAMANGA']);           
        $cangallo      = Province::create(['name' => 'CANGALLO']);
        $huancasancos  = Province::create(['name' => 'HUANCASANCOS']);
        $huanta        = Province::create(['name' => 'HUANTA']);
        $lamar         = Province::create(['name' => 'LA MAR']);
        $lucanas       = Province::create(['name' => 'LUCANAS']);
        $parinacochas  = Province::create(['name' => 'PARINACOCHAS']);
        $paucardelss   = Province::create(['name' => 'PÁUCAR DEL SARA SARA']);
        $sucre         = Province::create(['name' => 'SUCRE']);
        $victorfajardo = Province::create(['name' => 'VÍCTOR FAJARDO']);
        $vilcashuaman  = Province::create(['name' => 'VILCASHUAMÁN']);

        $huamanga->districts()->sync([
                                444, 445, 446, 447, 448, 449,
            450, 451, 452, 453, 454, 455, 456, 457, 458, 459
        ]);

        $cangallo->districts()->sync([460, 461, 462, 463, 464, 465]);

        $huancasancos->districts()->sync([466, 467, 468, 469]);

        $huanta->districts()->sync([470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481]);

        $lamar->districts()->sync([482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492]);

        $lucanas->districts()->sync([
                           493, 494, 495, 496, 497, 498, 499,
            500, 501, 502, 503, 504, 505, 506, 507, 508, 509,
            510, 511, 512, 513
        ]);

        $parinacochas->districts()->sync([514, 515, 516, 517, 518, 519, 520, 521]);

        $paucardelss->districts()->sync([522, 523, 524, 525, 526, 527, 528, 529, 530, 531]);

        $sucre->districts()->sync([532, 533, 534, 535, 536, 537, 538, 539, 540, 541, 542]);

        $victorfajardo->districts()->sync([543, 544, 545, 546, 547, 548, 549, 550, 551, 552, 553, 554]);

        $vilcashuaman->districts()->sync([555, 556, 557, 558, 559, 560, 561, 562]);

        // Provincias del Departamento de CAJAMARCA
        $cajamarca  = Province::create(['name' => 'CAJAMARCA']);
        $cajabamba  = Province::create(['name' => 'CAJABAMBA']);
        $celendin   = Province::create(['name' => 'CELENDÍN']);
        $contumaza  = Province::create(['name' => 'CONTUMAZÁ']);
        $cutervo    = Province::create(['name' => 'CUTERVO']);
        $chota      = Province::create(['name' => 'CHOTA']);
        $hualgayoc  = Province::create(['name' => 'HUALGAYOC']);
        $jaen       = Province::create(['name' => 'JAÉN']);
        $santacruz  = Province::create(['name' => 'SANTA CRUZ']);
        $sanmiguel  = Province::create(['name' => 'SAN MIGUEL']);
        $sanignacio = Province::create(['name' => 'SAN IGNACIO']);
        $sanmarcos  = Province::create(['name' => 'SAN MARCOS']);
        $sanpablo   = Province::create(['name' => 'SAN PABLO']);
        
        $cajamarca->districts()->sync([563, 564, 565, 566, 567, 568, 569, 570, 571, 572, 573, 574]);

        $cajabamba->districts()->sync([575, 576, 577, 578]);

        $celendin->districts()->sync([579, 580, 581, 582, 583, 584, 585, 586, 587, 588, 589, 590]);

        $contumaza->districts()->sync([591, 592, 593, 594, 595, 596, 597, 598]);

        $cutervo->districts()->sync([
                                                         599, 
            600, 601, 602, 603, 604, 605, 606, 607, 608, 609,
            610, 611, 612, 613
        ]);

        $chota->districts()->sync([
                                614, 615, 616, 617, 618, 619,
            620, 621, 622, 623, 624, 625, 626, 627, 628, 629,
            630, 631, 632
        ]);

        $hualgayoc->districts()->sync([633, 634, 635]);

        $jaen->districts()->sync([636, 637, 638, 639, 640, 641, 642, 643, 644, 645, 646, 647]);

        $santacruz->districts()->sync([648, 649, 650, 651, 652, 653, 654, 655, 656, 657, 658]);

        $sanmiguel->districts()->sync([659, 660, 661, 662, 663, 664, 665, 666, 667, 668, 669, 670, 671]);

        $sanignacio->districts()->sync([672, 673, 674, 675, 676, 677, 678]);

        $sanmarcos->districts()->sync([679, 680, 681, 682, 683, 684, 685]);

        $sanpablo->districts()->sync([686, 687, 688, 689]);

        // Provincias del Departamento de CALLAO
        $callao = Province::create(['name' => 'CALLAO']);

        $callao->districts()->sync([690, 691, 692, 693, 694, 695, 696]);

        // Provincias del Departamento de CUSCO
        $cusco        = Province::create(['name' => 'CUSCO']);
        $acomayo      = Province::create(['name' => 'ACOMAYO']);
        $anta         = Province::create(['name' => 'ANTA']);
        $calca        = Province::create(['name' => 'CALCA']);
        $canas        = Province::create(['name' => 'CANAS']);
        $canchis      = Province::create(['name' => 'CANCHIS']);
        $chumbivilcas = Province::create(['name' => 'CHUMBIVILCAS']);
        $espinar      = Province::create(['name' => 'ESPINAR']);
        $laconvencion = Province::create(['name' => 'LA CONVENCIÓN']);
        $paruro       = Province::create(['name' => 'PARURO']);
        $paucartambo  = Province::create(['name' => 'PAUCARTAMBO']);
        $quispicanchi = Province::create(['name' => 'QUISPICANCHI']);
        $urubamba     = Province::create(['name' => 'URUBAMBA']);

        $cusco->districts()->sync([697, 698, 699, 700, 701, 702, 703, 704]);

        $acomayo->districts()->sync([705, 706, 707, 708, 709, 710, 711]);

        $anta->districts()->sync([712, 713, 714, 715, 716, 717, 718, 719, 720]);

        $calca->districts()->sync([721, 722, 723, 724, 725, 726, 727, 728]);

        $canas->districts()->sync([729, 730, 731, 732, 733, 734, 735, 736]);

        $canchis->districts()->sync([737, 738, 739, 740, 741, 742, 743, 744]);

        $chumbivilcas->districts()->sync([745, 746, 747, 748, 749, 750, 751, 752]);

        $espinar->districts()->sync([752, 753, 754, 755, 756, 757, 758, 759, 760]);

        $laconvencion->districts()->sync([
                 761, 762, 763, 764, 765, 766, 767, 768, 769,
            770, 771, 772, 773, 774
        ]);

        $paruro->districts()->sync([775, 776, 777, 778, 779, 780, 781, 782, 783]);

        $paucartambo->districts()->sync([784, 785, 786, 787, 788, 789]);

        $quispicanchi->districts()->sync([790, 791, 792, 793, 794, 795, 796, 797, 798, 799, 800, 801]);

        $urubamba->districts()->sync([802, 803, 804, 805, 806, 807, 808]);
        
        // Provincias del Departamento de HUANCAVELICA
        $huancavelica   = Province::create(['name' => 'HUANCAVELICA']);
        $acobamba       = Province::create(['name' => 'ACOBAMBA']);
        $angaraes       = Province::create(['name' => 'ANGARAES']);
        $castrovirreyna = Province::create(['name' => 'CASTROVIRREYNA']);
        $churcampa      = Province::create(['name' => 'CHURCAMPA']);
        $huaytara       = Province::create(['name' => 'HUAYTARÁ']);
        $tayacaja       = Province::create(['name' => 'TAYACAJA']);

        $huancavelica->districts()->sync([
                                                         809,
            810, 811, 812, 813, 814, 815, 816, 817, 818, 819,
            820, 821, 822, 823, 824, 825, 826, 827
        ]);

        $acobamba->districts()->sync([828, 829, 830, 831, 832, 833, 834, 835]);

        $angaraes->districts()->sync([836, 837, 838, 839, 840, 841, 842, 843, 844, 845, 846, 847]);

        $castrovirreyna->districts()->sync([848, 849, 850, 851, 852, 853, 854, 855, 856, 857, 858, 859, 860]);

        $churcampa->districts()->sync([ 861, 862, 863, 864, 865, 866, 867, 868, 869, 870, 871]);

        $huaytara->districts()->sync([
                      872, 873, 874, 875, 876, 877, 878, 879,
            880, 881, 882, 883, 884, 885, 886, 887
        ]);

        $tayacaja->districts()->sync([
                                                    888, 889,
            890, 891, 892, 893, 894, 895, 896, 897, 898, 899,
            900, 901, 902, 903, 904, 905, 906, 907, 908
        ]);  

        // Provincias del Departamento de HUÁNUCO
        $huanuco      = Province::create(['name' => 'HUÁNUCO']);
        $ambo         = Province::create(['name' => 'AMBO']);
        $dosdemayo    = Province::create(['name' => 'DOS DE MAYO']);
        $huacaybamba  = Province::create(['name' => 'HUACAYBAMBA']);
        $huamalies    = Province::create(['name' => 'HUAMALÍES']);
        $leoncioprado = Province::create(['name' => 'LEONCIO PRADO']);
        $maranon      = Province::create(['name' => 'MARAÑÓN']);
        $pachitea     = Province::create(['name' => 'PACHITEA']);
        $puertoinca   = Province::create(['name' => 'PUERTO INCA']);
        $lauricocha   = Province::create(['name' => 'LAURICOCHA']);
        $yarowilca    = Province::create(['name' => 'YAROWILCA']);

        $huanuco->districts()->sync([909, 910, 911, 912, 913, 914, 915, 916, 917, 918, 919, 920, 921]);

        $ambo->districts()->sync([922, 923, 924, 925, 926, 927, 928, 929]);

        $dosdemayo->districts()->sync([930, 931, 932, 933, 934, 935, 936, 937, 938]);

        $huacaybamba->districts()->sync([939, 940, 941, 942]);

        $huamalies->districts()->sync([943, 944, 945, 946, 947, 948, 949, 950, 951, 952, 953]);

        $leoncioprado->districts()->sync([954, 955, 956, 957, 958, 959, 960, 961, 962, 963]);

        $maranon->districts()->sync([964, 965, 966, 967, 968]);

        $pachitea->districts()->sync([969, 970, 971, 972]);

        $puertoinca->districts()->sync([973, 974, 975, 976, 977]);

        $lauricocha->districts()->sync([978, 979, 980, 981, 982, 983, 984]);

        $yarowilca->districts()->sync([985, 986, 987, 988, 989, 990, 991, 992]);
        
        // Provincias del Departamento de ICA
        $ica     = Province::create(['name' => 'ICA']);
        $chincha = Province::create(['name' => 'CHINCHA']);
        $nazca   = Province::create(['name' => 'NAZCA']);
        $palpa   = Province::create(['name' => 'PALPA']);
        $pisco   = Province::create(['name' => 'PISCO']);

        $ica->districts()->sync([
                               993,  994,  995,  996, 997, 998, 999, 
            1000, 1001, 1002, 1003, 1004, 1005, 1006            
        ]);
        $chincha->districts()->sync([1007, 1008, 1009, 1010, 1011, 1012, 1013, 1014, 1015, 1016, 1017]);

        $nazca->districts()->sync([1018, 1019, 1020, 1021, 1022]);

        $palpa->districts()->sync([1023, 1024, 1025, 1026, 1027]);

        $pisco->districts()->sync([1028, 1029, 1030, 1031, 1032, 1033, 1034, 1035]);
        
        // Provincias del Departamento de JUNÍN
        $huancayo    = Province::create(['name' => 'HUANCAYO']);
        $concepcion  = Province::create(['name' => 'CONCEPCIÓN']);
        $chanchamayo = Province::create(['name' => 'CHANCHAMAYO']);
        $jauja       = Province::create(['name' => 'JAUJA']);
        $junin       = Province::create(['name' => 'JUNÍN']);
        $satipo      = Province::create(['name' => 'SATIPO']);
        $tarma       = Province::create(['name' => 'TARMA']);
        $yauli       = Province::create(['name' => 'YAULI']);
        $chupaca     = Province::create(['name' => 'CHUPACA']);

        $huancayo->districts()->sync([
                                                1036, 1037, 1038, 1039, 
            1040, 1041, 1042, 1043, 1044, 1045, 1046, 1047, 1048, 1049,
            1050, 1051, 1052, 1053, 1054, 1055, 1056, 1057, 1058, 1059,
            1060, 1061, 1062, 1063
        ]);

        $concepcion->districts()->sync([
                                    1064, 1065, 1066, 1067, 1068, 1069, 
            1070, 1071, 1072, 1073, 1074, 1075, 1076, 1077, 1078
        ]);

        $chanchamayo->districts()->sync([1079, 1080, 1081, 1082, 1083, 1084]);

        $jauja->districts()->sync([
                                          1085, 1086, 1087, 1088, 1089, 
            1090, 1091, 1092, 1093, 1094, 1095, 1096, 1097, 1098, 1099,
            1100, 1101, 1102, 1103, 1104, 1105, 1106, 1107, 1108, 1109,
            1110, 1111, 1112, 1113, 1114, 1115, 1116, 1117, 1118
        ]);

        $junin->districts()->sync([1119, 1120, 1121, 1122]);

        $satipo->districts()->sync([1123, 1124, 1125, 1126, 1127, 1128, 1129, 1130, 1131]);

        $tarma->districts()->sync([1132, 1133, 1134, 1135, 1136, 1137, 1138, 1139, 1140]);

        $yauli->districts()->sync([1141, 1142, 1143, 1144, 1145, 1146, 1147, 1148, 1149, 1150]);

        $chupaca->districts()->sync([1151, 1152, 1153, 1154, 1155, 1156, 1157, 1158, 1159]);
        
        // Provincias del Departamento de LA LIBERTAD
        $trujillo        = Province::create(['name' => 'TRUJILLO']);
        $ascope          = Province::create(['name' => 'ASCOPE']);
        $bolivar         = Province::create(['name' => 'BOLÍVAR']);         
        $chepen          = Province::create(['name' => 'CHEPÉN']);
        $julcan          = Province::create(['name' => 'JULCÁN']);
        $otuzco          = Province::create(['name' => 'OTUZCO']);
        $pacasmayo       = Province::create(['name' => 'PACASMAYO']);
        $pataz           = Province::create(['name' => 'PATAZ']);
        $sanchezcarrion  = Province::create(['name' => 'SÁNCHEZ CARRIÓN']);
        $santiagodechuco = Province::create(['name' => 'SANTIAGO DE CHUCO']);
        $granchimu       = Province::create(['name' => 'GRAN CHIMÚ']);
        $viru            = Province::create(['name' => 'VIRÚ']);

        $trujillo->districts()->sync([1160, 1161, 1162, 1163, 1164, 1165, 1166, 1167, 1168, 1169, 1170]);

        $ascope->districts()->sync([1171, 1172, 1173, 1174, 1175, 1176, 1177, 1178]);

        $bolivar->districts()->sync([1179, 1180, 1181, 1182, 1183, 1184]);

        $chepen->districts()->sync([1185, 1186, 1187]);

        $julcan->districts()->sync([1188, 1189, 1190, 1191]);

        $otuzco->districts()->sync([1192, 1193, 1194, 1195, 1196, 1197, 1198, 1199, 1200, 1201]);

        $pacasmayo->districts()->sync([1202, 1203, 1204, 1205, 1206]);

        $pataz->districts()->sync([
                                                      1207, 1208, 1209, 
            1210, 1211, 1212, 1213, 1214, 1215, 1216, 1217, 1218, 1219
        ]);

        $sanchezcarrion->districts()->sync([1220, 1221, 1222, 1223, 1224, 1225, 1226, 1227]);

        $santiagodechuco->districts()->sync([1218, 1229, 1230, 1231, 1232, 1233, 1234, 1235]);

        $granchimu->districts()->sync([1236, 1237, 1238, 1239]);

        $viru->districts()->sync([1240, 1241, 1242]);

        // Provincias del Departamento de LAMBAYEQUE
        $chiclayo   = Province::create(['name' => 'CHICLAYO']);
        $ferrenafe  = Province::create(['name' => 'FERREÑAFE']);
        $lambayeque = Province::create(['name' => 'LAMBAYEQUE']);

        $chiclayo->districts()->sync([
                              1243, 1244, 1245, 1246, 1247, 1248, 1249,
            1250, 1251, 1252, 1253, 1254, 1255, 1256, 1257, 1258, 1259,
            1260, 1261, 1262
        ]);

        $ferrenafe->districts()->sync([1263, 1264, 1265, 1266, 1267, 1268]);

        $lambayeque->districts()->sync([1269, 1270, 1271, 1272, 1273, 1274, 1275, 1276, 1277, 1278, 1279, 1280]);

        // Provincias del Departamento de LIMA
        $lima       = Province::create(['name' => 'LIMA']);
        $barranca   = Province::create(['name' => 'BARRANCA']);
        $cajatambo  = Province::create(['name' => 'CAJATAMBO']);
        $canta      = Province::create(['name' => 'CANTA']);
        $canete     = Province::create(['name' => 'CAÑETE']);
        $huaral     = Province::create(['name' => 'HUARAL']);
        $huarochiri = Province::create(['name' => 'HUAROCHIRÍ']);
        $huaura     = Province::create(['name' => 'HUAURA']);
        $oyon       = Province::create(['name' => 'OYÓN']);
        $yauyos     = Province::create(['name' => 'YAUYOS']);

        $lima->districts()->sync([
                  1281, 1282, 1283, 1284, 1285, 1286, 1287, 1288, 1289,
            1290, 1291, 1292, 1293, 1294, 1295, 1296, 1297, 1298, 1299,
            1300, 1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308, 1309,
            1310, 1311, 1312, 1313, 1314, 1315, 1316, 1317, 1318, 1319,
            1320, 1321, 1322, 1323
        ]);

        $barranca->districts()->sync([1324, 1325, 1326, 1327, 1328]);

        $cajatambo->districts()->sync([1329, 1330, 1331, 1332, 1333]);

        $canta->districts()->sync([1334, 1335, 1336, 1337, 1338, 1339, 1340]);

        $canete->districts()->sync([
                  1341, 1342, 1343, 1344, 1345, 1346, 1347, 1348, 1349,
            1350, 1351, 1352, 1353, 1354, 1355, 1356
        ]);

        $huaral->districts()->sync([1357, 1358, 1359, 1360, 1361, 1362, 1363, 1364, 1365, 1366, 1367, 1368]);

        $huarochiri->districts()->sync([
                                                                  1369,
            1370, 1371, 1372, 1373, 1374, 1375, 1376, 1377, 1378, 1379,
            1380, 1381, 1382, 1383, 1384, 1385, 1386, 1387, 1388, 1389,
            1390, 1391, 1392, 1393, 1394, 1395, 1396, 1397, 1398, 1399,
            1400
        ]);

        $huaura->districts()->sync([1401, 1402, 1403, 1404, 1405, 1406, 1407, 1408, 1409, 1410, 1411, 1412]);

        $oyon->districts()->sync([1413, 1414, 1415, 1416, 1417, 1418]);

        $yauyos->districts()->sync([
                                                                  1319,
            1420, 1421, 1422, 1423, 1424, 1425, 1426, 1427, 1428, 1429,
            1430, 1431, 1432, 1433, 1434, 1435, 1436, 1437, 1438, 1439,
            1440, 1441, 1442, 1443, 1444, 1445, 1446, 1447, 1448, 1449,
            1450, 1451
        ]);

        // Provincias del Departamento de LORETO
        $maynas         = Province::create(['name' => 'MAYNAS']);
        $altoamazonas   = Province::create(['name' => 'ALTO AMAZONAS']);
        $loreto         = Province::create(['name' => 'LORETO']);
        $ramoncastilla  = Province::create(['name' => 'MARISCAL RAMÓN CASTILLA']);
        $requena        = Province::create(['name' => 'REQUENA']);
        $ucayali        = Province::create(['name' => 'UCAYALI']);
        $datem          = Province::create(['name' => 'DATEM DEL MARAÑÓN']);
        $putumayo       = Province::create(['name' => 'PUTUMAYO']);
        
        $maynas->districts()->sync([1452, 1453, 1454, 1455, 1456, 1457, 1458, 1459, 1460, 1461, 1462]);

        $altoamazonas->districts()->sync([1463, 1464, 1465, 1466, 1467, 1468]);

        $loreto->districts()->sync([1469, 1470, 1471, 1472, 1473]);

        $ramoncastilla->districts()->sync([1473, 1474, 1475, 1476, 1477]);

        $requena->districts()->sync([1478, 1479, 1480, 1481, 1482, 1483, 1484, 1485, 1486, 1487, 1488]);

        $ucayali->districts()->sync([1489, 1490, 1491, 1492, 1493, 1494]);

        $datem->districts()->sync([1495, 1496, 1497, 1498, 1499, 1500]);

        $putumayo->districts()->sync([1501, 1502, 1503, 1504]);

        // Provincias del Departamento de MADRE DE DIOS
        $tambopata = Province::create(['name' => 'TAMBOPATA']);
        $manu      = Province::create(['name' => 'MANU']);
        $tahuamanu = Province::create(['name' => 'TAHUAMANU']);

        $tambopata->districts()->sync([1505, 1506, 1507, 1508]);

        $manu->districts()->sync([1509, 1510, 1511, 1512]);

        $tahuamanu->districts()->sync([1513, 1514, 1515]);

        // Provincias del Departamento de MOQUEGUA
        $generalsanchez = Province::create(['name' => 'GENERAL SÁNCHEZ CERRO']);
        $mariscalnieto  = Province::create(['name' => 'MARISCAL NIETO']);
        $ilo            = Province::create(['name' => 'ILO']);

        $generalsanchez->districts()->sync([1516, 1517, 1518, 1519, 1520, 1521, 1522, 1523, 1524, 1525, 1526]);

        $mariscalnieto->districts()->sync([1527, 1528, 1529, 1530, 1531, 1532]);

        $ilo->districts()->sync([1533, 1534, 1535]);

        // Provincias del Departamento de MOQUEGUA
        $pasco    = Province::create(['name' => 'PASCO']);
        $daniel   = Province::create(['name' => 'DANIEL ALCIDES CARRIÓN']);
        $oxapampa = Province::create(['name' => 'OXAPAMPA']);      
        
        $pasco->districts()->sync([1536, 1537, 1538, 1539, 1540, 1541, 1542, 1543, 1544, 1545, 1546, 1547, 1548]);

        $daniel->districts()->sync([1549, 1550, 1551, 1552, 1553, 1554, 1555, 1556]);

        $oxapampa->districts()->sync([1557, 1558, 1559, 1560, 1561, 1562, 1563, 1564]);

        // Provincias del Departamento de PIURA
        $piura       = Province::create(['name' => 'PIURA']);
        $ayabaca     = Province::create(['name' => 'AYABACA']);
        $huancabamba = Province::create(['name' => 'HUANCABAMBA']);
        $morropon    = Province::create(['name' => 'MORROPÓN']);
        $paita       = Province::create(['name' => 'PAITA']);
        $sullana     = Province::create(['name' => 'SULLANA']);
        $talara      = Province::create(['name' => 'TALARA']);
        $sechura     = Province::create(['name' => 'SECHURA']);

        $piura->districts()->sync([1565, 1566, 1567, 1568, 1569, 1570, 1571, 1572, 1573, 1574]);

        $ayabaca->districts()->sync([1575, 1576, 1577, 1578, 1579, 1580, 1581, 1582, 1583, 1584]);

        $huancabamba->districts()->sync([1585, 1586, 1587, 1588, 1589, 1590, 1591, 1592]);

        $morropon->districts()->sync([1593, 1594, 1595, 1596, 1597, 1598, 1599, 1600, 1601, 1602]);

        $paita->districts()->sync([1603, 1604, 1605, 1606, 1607, 1608, 1609]);

        $sullana->districts()->sync([1610, 1611, 1612, 1613, 1614, 1615, 1616, 1617]);

        $talara->districts()->sync([1618, 1619, 1620, 1621, 1622, 1623]);

        $sechura->districts()->sync([1624, 1625, 1626, 1627, 1628, 1629]);

        // Provincias del Departamento de PUNO
        $puno       = Province::create(['name' => 'PUNO']);
        $sanroman   = Province::create(['name' => 'SAN ROMÁN']);
        $azangaro   = Province::create(['name' => 'AZÁNGARO']);
        $chucuito   = Province::create(['name' => 'CHUCUITO']);
        $elcollao   = Province::create(['name' => 'EL COLLAO']);
        $melgar     = Province::create(['name' => 'MELGAR']);
        $carabaya   = Province::create(['name' => 'CARABAYA']);
        $huancane   = Province::create(['name' => 'HUANCANÉ']);
        $sandia     = Province::create(['name' => 'SANDIA']);
        $sanantonio = Province::create(['name' => 'SAN ANTONIO DE PUTINA']);
        $lampa      = Province::create(['name' => 'LAMPA']);
        $yunguyo    = Province::create(['name' => 'YUNGUYO']);
        $moho       = Province::create(['name' => 'MOHO']);

        $puno->districts()->sync([
            1630, 1631, 1632, 1633, 1634, 1635, 1636, 1637, 1638, 1639,
            1640, 1641, 1642, 1643, 1644
        ]);

        $sanroman->districts()->sync([
            1645, 1646, 1647, 1648, 1649
        ]);

        $azangaro->districts()->sync([
            1650, 1651, 1652, 1653, 1654, 1655, 1656, 1657, 1658, 1659,
            1660, 1661, 1662, 1663, 1664
        ]);

        $chucuito->districts()->sync([1665, 1666, 1667, 1668, 1669, 1670, 1671]);

        $elcollao->districts()->sync([1672, 1673, 1674, 1675, 1676]);

        $melgar->districts()->sync([1677, 1678, 1679, 1680, 1681, 1682, 1683, 1684, 1685]);

        $carabaya->districts()->sync([1686, 1687, 1688, 1689, 1690, 1691, 1692, 1693, 1694, 1695]);

        $huancane->districts()->sync([1696, 1697, 1698, 1699, 1700, 1701, 1702, 1703]);

        $sandia->districts()->sync([1704, 1705, 1706, 1707, 1708, 1709, 1710, 1711, 1712, 1713]);

        $sanantonio->districts()->sync([1714, 1715, 1716, 1717, 1718]);

        $lampa->districts()->sync([1719, 1720, 1721, 1722, 1723, 1724, 1725, 1726, 1727, 1728]);

        $yunguyo->districts()->sync([1729, 1730, 1731, 1732, 1733, 1734, 1735]);

        $moho->districts()->sync([1736, 1737, 1738, 1739]);

        // Provincias del Departamento de SAN MARTÍN
        $moyobamba       = Province::create(['name' => 'MOYOBAMBA']);
        $bellavista      = Province::create(['name' => 'BELLAVISTA']);
        $eldorado        = Province::create(['name' => 'EL DORADO']);
        $huallaga        = Province::create(['name' => 'HUALLAGA']);
        $lamas           = Province::create(['name' => 'LAMAS']);
        $mariscalcaceres = Province::create(['name' => 'MARISCAL CÁCERES']);
        $picota          = Province::create(['name' => 'PICOTA']);
        $rioja           = Province::create(['name' => 'RIOJA']);
        $sanmartin       = Province::create(['name' => 'SAN MARTÍN']);
        $tocache         = Province::create(['name' => 'TOCACHE']);

        $moyobamba->districts()->sync([1740, 1741, 1742, 1743, 1744, 1745]);

        $bellavista->districts()->sync([1746, 1747, 1748, 1749, 1750, 1751]);

        $eldorado->districts()->sync([1752, 1753, 1754, 1755, 1756]);

        $huallaga->districts()->sync([1757, 1758, 1759, 1760, 1761, 1762]);

        $lamas->districts()->sync([1763, 1764, 1765, 1766, 1767, 1768, 1769, 1770, 1771, 1772, 1773]);
        
        $mariscalcaceres->districts()->sync([1774, 1775, 1776, 1777, 1778]);

        $picota->districts()->sync([1779, 1780, 1781, 1782, 1783, 1784, 1785, 1786, 1787, 1788, 1788]);

        $rioja->districts()->sync([1789, 1790, 1791, 1792, 1793, 1794, 1795, 1796, 1797]);

        $sanmartin->districts()->sync([
                                                                  1799, 
            1800, 1801, 1802, 1803, 1804, 1805, 1806, 1807, 1808, 1809,
            1810, 1811
        ]);

        $tocache->districts()->sync([1812, 1813, 1814, 1815, 1816]);

        // Provincias del Departamento de TACNA
        $tacna        = Province::create(['name' => 'TACNA']);
        $candarave    = Province::create(['name' => 'CANDARAVE']);
        $jorgebasadre = Province::create(['name' => 'JORGE BASADRE']);
        $tarata       = Province::create(['name' => 'TARATA']);

        $tacna->districts()->sync([1817, 1818, 1819, 1820, 1821, 1822, 1823, 1824, 1825, 1826, 1827]);

        $candarave->districts()->sync([1828, 1829, 1830, 1831, 1832, 1833]);

        $jorgebasadre->districts()->sync([1834, 1835, 1836]);

        $tarata->districts()->sync([1837, 1838, 1839, 1840, 1841, 1842, 1843, 1844]);
        
        // Provincias del Departamento de TUMBES
        $tumbes         = Province::create(['name' => 'TUMBES']);
        $zarumilla      = Province::create(['name' => 'ZARUMILLA']);
        $contralmirante = Province::create(['name' => 'CONTRALMIRANTE VILLAR']);

        $tumbes->districts()->sync([1845, 1846, 1847, 1848, 1849, 1850]);

        $zarumilla->districts()->sync([1851, 1852, 1853, 1854]);

        $contralmirante->districts()->sync([1855, 1856, 1857]);

        // Provincias del Departamento de UCAYALI
        $coronelportillo = Province::create(['name' => 'CORONEL PORTILLO']);
        $atalaya         = Province::create(['name' => 'ATALAYA']); 
        $padreabad       = Province::create(['name' => 'PADRE ABAD']); 
        $purus           = Province::create(['name' => 'PURÚS']);

        $coronelportillo->districts()->sync([1857, 1858, 1859, 1860, 1861, 1862, 1863, 1864]);

        $atalaya->districts()->sync([1865, 1866, 1867, 1868]);

        $padreabad->districts()->sync([1869, 1870, 1871, 1872, 1873]);

        $purus->districts()->sync([1874]);
    }
}
