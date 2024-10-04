<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pais')->delete();
        
        \DB::table('pais')->insert(array (
            0 => 
            array (
                'id' => 1,
                'paisnombre' => 'Australia',
            ),
            1 => 
            array (
                'id' => 2,
                'paisnombre' => 'Austria',
            ),
            2 => 
            array (
                'id' => 3,
                'paisnombre' => 'Azerbaiyán',
            ),
            3 => 
            array (
                'id' => 4,
                'paisnombre' => 'Anguilla',
            ),
            4 => 
            array (
                'id' => 5,
                'paisnombre' => 'Argentina',
            ),
            5 => 
            array (
                'id' => 6,
                'paisnombre' => 'Armenia',
            ),
            6 => 
            array (
                'id' => 7,
                'paisnombre' => 'Bielorrusia',
            ),
            7 => 
            array (
                'id' => 8,
                'paisnombre' => 'Belice',
            ),
            8 => 
            array (
                'id' => 9,
                'paisnombre' => 'Bélgica',
            ),
            9 => 
            array (
                'id' => 10,
                'paisnombre' => 'Bermudas',
            ),
            10 => 
            array (
                'id' => 11,
                'paisnombre' => 'Bulgaria',
            ),
            11 => 
            array (
                'id' => 12,
                'paisnombre' => 'Brasil',
            ),
            12 => 
            array (
                'id' => 13,
                'paisnombre' => 'Reino Unido',
            ),
            13 => 
            array (
                'id' => 14,
                'paisnombre' => 'Hungría',
            ),
            14 => 
            array (
                'id' => 15,
                'paisnombre' => 'Vietnam',
            ),
            15 => 
            array (
                'id' => 16,
                'paisnombre' => 'Haiti',
            ),
            16 => 
            array (
                'id' => 17,
                'paisnombre' => 'Guadalupe',
            ),
            17 => 
            array (
                'id' => 18,
                'paisnombre' => 'Alemania',
            ),
            18 => 
            array (
                'id' => 19,
                'paisnombre' => 'Países Bajos, Holanda',
            ),
            19 => 
            array (
                'id' => 20,
                'paisnombre' => 'Grecia',
            ),
            20 => 
            array (
                'id' => 21,
                'paisnombre' => 'Georgia',
            ),
            21 => 
            array (
                'id' => 22,
                'paisnombre' => 'Dinamarca',
            ),
            22 => 
            array (
                'id' => 23,
                'paisnombre' => 'Egipto',
            ),
            23 => 
            array (
                'id' => 24,
                'paisnombre' => 'Israel',
            ),
            24 => 
            array (
                'id' => 25,
                'paisnombre' => 'India',
            ),
            25 => 
            array (
                'id' => 26,
                'paisnombre' => 'Irán',
            ),
            26 => 
            array (
                'id' => 27,
                'paisnombre' => 'Irlanda',
            ),
            27 => 
            array (
                'id' => 28,
                'paisnombre' => 'España',
            ),
            28 => 
            array (
                'id' => 29,
                'paisnombre' => 'Italia',
            ),
            29 => 
            array (
                'id' => 30,
                'paisnombre' => 'Kazajstán',
            ),
            30 => 
            array (
                'id' => 31,
                'paisnombre' => 'Camerún',
            ),
            31 => 
            array (
                'id' => 32,
                'paisnombre' => 'Canadá',
            ),
            32 => 
            array (
                'id' => 33,
                'paisnombre' => 'Chipre',
            ),
            33 => 
            array (
                'id' => 34,
                'paisnombre' => 'Kirguistán',
            ),
            34 => 
            array (
                'id' => 35,
                'paisnombre' => 'China',
            ),
            35 => 
            array (
                'id' => 36,
                'paisnombre' => 'Costa Rica',
            ),
            36 => 
            array (
                'id' => 37,
                'paisnombre' => 'Kuwait',
            ),
            37 => 
            array (
                'id' => 38,
                'paisnombre' => 'Letonia',
            ),
            38 => 
            array (
                'id' => 39,
                'paisnombre' => 'Libia',
            ),
            39 => 
            array (
                'id' => 40,
                'paisnombre' => 'Lituania',
            ),
            40 => 
            array (
                'id' => 41,
                'paisnombre' => 'Luxemburgo',
            ),
            41 => 
            array (
                'id' => 42,
                'paisnombre' => 'México',
            ),
            42 => 
            array (
                'id' => 43,
                'paisnombre' => 'Moldavia',
            ),
            43 => 
            array (
                'id' => 44,
                'paisnombre' => 'Mónaco',
            ),
            44 => 
            array (
                'id' => 45,
                'paisnombre' => 'Nueva Zelanda',
            ),
            45 => 
            array (
                'id' => 46,
                'paisnombre' => 'Noruega',
            ),
            46 => 
            array (
                'id' => 47,
                'paisnombre' => 'Polonia',
            ),
            47 => 
            array (
                'id' => 48,
                'paisnombre' => 'Portugal',
            ),
            48 => 
            array (
                'id' => 49,
                'paisnombre' => 'Reunión',
            ),
            49 => 
            array (
                'id' => 50,
                'paisnombre' => 'Rusia',
            ),
            50 => 
            array (
                'id' => 51,
                'paisnombre' => 'El Salvador',
            ),
            51 => 
            array (
                'id' => 52,
                'paisnombre' => 'Eslovaquia',
            ),
            52 => 
            array (
                'id' => 53,
                'paisnombre' => 'Eslovenia',
            ),
            53 => 
            array (
                'id' => 54,
                'paisnombre' => 'Surinam',
            ),
            54 => 
            array (
                'id' => 55,
                'paisnombre' => 'Estados Unidos',
            ),
            55 => 
            array (
                'id' => 56,
                'paisnombre' => 'Tadjikistan',
            ),
            56 => 
            array (
                'id' => 57,
                'paisnombre' => 'Turkmenistan',
            ),
            57 => 
            array (
                'id' => 58,
                'paisnombre' => 'Islas Turcas y Caicos',
            ),
            58 => 
            array (
                'id' => 59,
                'paisnombre' => 'Turquía',
            ),
            59 => 
            array (
                'id' => 60,
                'paisnombre' => 'Uganda',
            ),
            60 => 
            array (
                'id' => 61,
                'paisnombre' => 'Uzbekistán',
            ),
            61 => 
            array (
                'id' => 62,
                'paisnombre' => 'Ucrania',
            ),
            62 => 
            array (
                'id' => 63,
                'paisnombre' => 'Finlandia',
            ),
            63 => 
            array (
                'id' => 64,
                'paisnombre' => 'Francia',
            ),
            64 => 
            array (
                'id' => 65,
                'paisnombre' => 'República Checa',
            ),
            65 => 
            array (
                'id' => 66,
                'paisnombre' => 'Suiza',
            ),
            66 => 
            array (
                'id' => 67,
                'paisnombre' => 'Suecia',
            ),
            67 => 
            array (
                'id' => 68,
                'paisnombre' => 'Estonia',
            ),
            68 => 
            array (
                'id' => 69,
                'paisnombre' => 'Corea del Sur',
            ),
            69 => 
            array (
                'id' => 70,
                'paisnombre' => 'Japón',
            ),
            70 => 
            array (
                'id' => 71,
                'paisnombre' => 'Croacia',
            ),
            71 => 
            array (
                'id' => 72,
                'paisnombre' => 'Rumanía',
            ),
            72 => 
            array (
                'id' => 73,
                'paisnombre' => 'Hong Kong',
            ),
            73 => 
            array (
                'id' => 74,
                'paisnombre' => 'Indonesia',
            ),
            74 => 
            array (
                'id' => 75,
                'paisnombre' => 'Jordania',
            ),
            75 => 
            array (
                'id' => 76,
                'paisnombre' => 'Malasia',
            ),
            76 => 
            array (
                'id' => 77,
                'paisnombre' => 'Singapur',
            ),
            77 => 
            array (
                'id' => 78,
                'paisnombre' => 'Taiwan',
            ),
            78 => 
            array (
                'id' => 79,
                'paisnombre' => 'Bosnia y Herzegovina',
            ),
            79 => 
            array (
                'id' => 80,
                'paisnombre' => 'Bahamas',
            ),
            80 => 
            array (
                'id' => 81,
                'paisnombre' => 'Chile',
            ),
            81 => 
            array (
                'id' => 82,
                'paisnombre' => 'Colombia',
            ),
            82 => 
            array (
                'id' => 83,
                'paisnombre' => 'Islandia',
            ),
            83 => 
            array (
                'id' => 84,
                'paisnombre' => 'Corea del Norte',
            ),
            84 => 
            array (
                'id' => 85,
                'paisnombre' => 'Macedonia',
            ),
            85 => 
            array (
                'id' => 86,
                'paisnombre' => 'Malta',
            ),
            86 => 
            array (
                'id' => 87,
                'paisnombre' => 'Pakistán',
            ),
            87 => 
            array (
                'id' => 88,
                'paisnombre' => 'Papúa-Nueva Guinea',
            ),
            88 => 
            array (
                'id' => 89,
                'paisnombre' => 'Perú',
            ),
            89 => 
            array (
                'id' => 90,
                'paisnombre' => 'Filipinas',
            ),
            90 => 
            array (
                'id' => 91,
                'paisnombre' => 'Arabia Saudita',
            ),
            91 => 
            array (
                'id' => 92,
                'paisnombre' => 'Tailandia',
            ),
            92 => 
            array (
                'id' => 93,
                'paisnombre' => 'Emiratos árabes Unidos',
            ),
            93 => 
            array (
                'id' => 94,
                'paisnombre' => 'Groenlandia',
            ),
            94 => 
            array (
                'id' => 95,
                'paisnombre' => 'Venezuela',
            ),
            95 => 
            array (
                'id' => 96,
                'paisnombre' => 'Zimbabwe',
            ),
            96 => 
            array (
                'id' => 97,
                'paisnombre' => 'Kenia',
            ),
            97 => 
            array (
                'id' => 98,
                'paisnombre' => 'Algeria',
            ),
            98 => 
            array (
                'id' => 99,
                'paisnombre' => 'Líbano',
            ),
            99 => 
            array (
                'id' => 100,
                'paisnombre' => 'Botsuana',
            ),
            100 => 
            array (
                'id' => 101,
                'paisnombre' => 'Tanzania',
            ),
            101 => 
            array (
                'id' => 102,
                'paisnombre' => 'Namibia',
            ),
            102 => 
            array (
                'id' => 103,
                'paisnombre' => 'Ecuador',
            ),
            103 => 
            array (
                'id' => 104,
                'paisnombre' => 'Marruecos',
            ),
            104 => 
            array (
                'id' => 105,
                'paisnombre' => 'Ghana',
            ),
            105 => 
            array (
                'id' => 106,
                'paisnombre' => 'Siria',
            ),
            106 => 
            array (
                'id' => 107,
                'paisnombre' => 'Nepal',
            ),
            107 => 
            array (
                'id' => 108,
                'paisnombre' => 'Mauritania',
            ),
            108 => 
            array (
                'id' => 109,
                'paisnombre' => 'Seychelles',
            ),
            109 => 
            array (
                'id' => 110,
                'paisnombre' => 'Paraguay',
            ),
            110 => 
            array (
                'id' => 111,
                'paisnombre' => 'Uruguay',
            ),
            111 => 
            array (
                'id' => 112,
            'paisnombre' => 'Congo (Brazzaville)',
            ),
            112 => 
            array (
                'id' => 113,
                'paisnombre' => 'Cuba',
            ),
            113 => 
            array (
                'id' => 114,
                'paisnombre' => 'Albania',
            ),
            114 => 
            array (
                'id' => 115,
                'paisnombre' => 'Nigeria',
            ),
            115 => 
            array (
                'id' => 116,
                'paisnombre' => 'Zambia',
            ),
            116 => 
            array (
                'id' => 117,
                'paisnombre' => 'Mozambique',
            ),
            117 => 
            array (
                'id' => 119,
                'paisnombre' => 'Angola',
            ),
            118 => 
            array (
                'id' => 120,
                'paisnombre' => 'Sri Lanka',
            ),
            119 => 
            array (
                'id' => 121,
                'paisnombre' => 'Etiopía',
            ),
            120 => 
            array (
                'id' => 122,
                'paisnombre' => 'Túnez',
            ),
            121 => 
            array (
                'id' => 123,
                'paisnombre' => 'Bolivia',
            ),
            122 => 
            array (
                'id' => 124,
                'paisnombre' => 'Panamá',
            ),
            123 => 
            array (
                'id' => 125,
                'paisnombre' => 'Malawi',
            ),
            124 => 
            array (
                'id' => 126,
                'paisnombre' => 'Liechtenstein',
            ),
            125 => 
            array (
                'id' => 127,
                'paisnombre' => 'Bahrein',
            ),
            126 => 
            array (
                'id' => 128,
                'paisnombre' => 'Barbados',
            ),
            127 => 
            array (
                'id' => 130,
                'paisnombre' => 'Chad',
            ),
            128 => 
            array (
                'id' => 131,
                'paisnombre' => 'Man, Isla de',
            ),
            129 => 
            array (
                'id' => 132,
                'paisnombre' => 'Jamaica',
            ),
            130 => 
            array (
                'id' => 133,
                'paisnombre' => 'Malí',
            ),
            131 => 
            array (
                'id' => 134,
                'paisnombre' => 'Madagascar',
            ),
            132 => 
            array (
                'id' => 135,
                'paisnombre' => 'Senegal',
            ),
            133 => 
            array (
                'id' => 136,
                'paisnombre' => 'Togo',
            ),
            134 => 
            array (
                'id' => 137,
                'paisnombre' => 'Honduras',
            ),
            135 => 
            array (
                'id' => 138,
                'paisnombre' => 'República Dominicana',
            ),
            136 => 
            array (
                'id' => 139,
                'paisnombre' => 'Mongolia',
            ),
            137 => 
            array (
                'id' => 140,
                'paisnombre' => 'Irak',
            ),
            138 => 
            array (
                'id' => 141,
                'paisnombre' => 'Sudáfrica',
            ),
            139 => 
            array (
                'id' => 142,
                'paisnombre' => 'Aruba',
            ),
            140 => 
            array (
                'id' => 143,
                'paisnombre' => 'Gibraltar',
            ),
            141 => 
            array (
                'id' => 144,
                'paisnombre' => 'Afganistán',
            ),
            142 => 
            array (
                'id' => 145,
                'paisnombre' => 'Andorra',
            ),
            143 => 
            array (
                'id' => 147,
                'paisnombre' => 'Antigua y Barbuda',
            ),
            144 => 
            array (
                'id' => 149,
                'paisnombre' => 'Bangladesh',
            ),
            145 => 
            array (
                'id' => 151,
                'paisnombre' => 'Benín',
            ),
            146 => 
            array (
                'id' => 152,
                'paisnombre' => 'Bután',
            ),
            147 => 
            array (
                'id' => 154,
                'paisnombre' => 'Islas Virgenes Británicas',
            ),
            148 => 
            array (
                'id' => 155,
                'paisnombre' => 'Brunéi',
            ),
            149 => 
            array (
                'id' => 156,
                'paisnombre' => 'Burkina Faso',
            ),
            150 => 
            array (
                'id' => 157,
                'paisnombre' => 'Burundi',
            ),
            151 => 
            array (
                'id' => 158,
                'paisnombre' => 'Camboya',
            ),
            152 => 
            array (
                'id' => 159,
                'paisnombre' => 'Cabo Verde',
            ),
            153 => 
            array (
                'id' => 164,
                'paisnombre' => 'Comores',
            ),
            154 => 
            array (
                'id' => 165,
            'paisnombre' => 'Congo (Kinshasa)',
            ),
            155 => 
            array (
                'id' => 166,
                'paisnombre' => 'Cook, Islas',
            ),
            156 => 
            array (
                'id' => 168,
                'paisnombre' => 'Costa de Marfil',
            ),
            157 => 
            array (
                'id' => 169,
                'paisnombre' => 'Djibouti, Yibuti',
            ),
            158 => 
            array (
                'id' => 171,
                'paisnombre' => 'Timor Oriental',
            ),
            159 => 
            array (
                'id' => 172,
                'paisnombre' => 'Guinea Ecuatorial',
            ),
            160 => 
            array (
                'id' => 173,
                'paisnombre' => 'Eritrea',
            ),
            161 => 
            array (
                'id' => 175,
                'paisnombre' => 'Feroe, Islas',
            ),
            162 => 
            array (
                'id' => 176,
                'paisnombre' => 'Fiyi',
            ),
            163 => 
            array (
                'id' => 178,
                'paisnombre' => 'Polinesia Francesa',
            ),
            164 => 
            array (
                'id' => 180,
                'paisnombre' => 'Gabón',
            ),
            165 => 
            array (
                'id' => 181,
                'paisnombre' => 'Gambia',
            ),
            166 => 
            array (
                'id' => 184,
                'paisnombre' => 'Granada',
            ),
            167 => 
            array (
                'id' => 185,
                'paisnombre' => 'Guatemala',
            ),
            168 => 
            array (
                'id' => 186,
                'paisnombre' => 'Guernsey',
            ),
            169 => 
            array (
                'id' => 187,
                'paisnombre' => 'Guinea',
            ),
            170 => 
            array (
                'id' => 188,
                'paisnombre' => 'Guinea-Bissau',
            ),
            171 => 
            array (
                'id' => 189,
                'paisnombre' => 'Guyana',
            ),
            172 => 
            array (
                'id' => 193,
                'paisnombre' => 'Jersey',
            ),
            173 => 
            array (
                'id' => 195,
                'paisnombre' => 'Kiribati',
            ),
            174 => 
            array (
                'id' => 196,
                'paisnombre' => 'Laos',
            ),
            175 => 
            array (
                'id' => 197,
                'paisnombre' => 'Lesotho',
            ),
            176 => 
            array (
                'id' => 198,
                'paisnombre' => 'Liberia',
            ),
            177 => 
            array (
                'id' => 200,
                'paisnombre' => 'Maldivas',
            ),
            178 => 
            array (
                'id' => 201,
                'paisnombre' => 'Martinica',
            ),
            179 => 
            array (
                'id' => 202,
                'paisnombre' => 'Mauricio',
            ),
            180 => 
            array (
                'id' => 205,
                'paisnombre' => 'Myanmar',
            ),
            181 => 
            array (
                'id' => 206,
                'paisnombre' => 'Nauru',
            ),
            182 => 
            array (
                'id' => 207,
                'paisnombre' => 'Antillas Holandesas',
            ),
            183 => 
            array (
                'id' => 208,
                'paisnombre' => 'Nueva Caledonia',
            ),
            184 => 
            array (
                'id' => 209,
                'paisnombre' => 'Nicaragua',
            ),
            185 => 
            array (
                'id' => 210,
                'paisnombre' => 'Níger',
            ),
            186 => 
            array (
                'id' => 212,
                'paisnombre' => 'Norfolk Island',
            ),
            187 => 
            array (
                'id' => 213,
                'paisnombre' => 'Omán',
            ),
            188 => 
            array (
                'id' => 215,
                'paisnombre' => 'Isla Pitcairn',
            ),
            189 => 
            array (
                'id' => 216,
                'paisnombre' => 'Qatar',
            ),
            190 => 
            array (
                'id' => 217,
                'paisnombre' => 'Ruanda',
            ),
            191 => 
            array (
                'id' => 218,
                'paisnombre' => 'Santa Elena',
            ),
            192 => 
            array (
                'id' => 219,
                'paisnombre' => 'San Cristobal y Nevis',
            ),
            193 => 
            array (
                'id' => 220,
                'paisnombre' => 'Santa Lucía',
            ),
            194 => 
            array (
                'id' => 221,
                'paisnombre' => 'San Pedro y Miquelón',
            ),
            195 => 
            array (
                'id' => 222,
                'paisnombre' => 'San Vincente y Granadinas',
            ),
            196 => 
            array (
                'id' => 223,
                'paisnombre' => 'Samoa',
            ),
            197 => 
            array (
                'id' => 224,
                'paisnombre' => 'San Marino',
            ),
            198 => 
            array (
                'id' => 225,
                'paisnombre' => 'San Tomé y Príncipe',
            ),
            199 => 
            array (
                'id' => 226,
                'paisnombre' => 'Serbia y Montenegro',
            ),
            200 => 
            array (
                'id' => 227,
                'paisnombre' => 'Sierra Leona',
            ),
            201 => 
            array (
                'id' => 228,
                'paisnombre' => 'Islas Salomón',
            ),
            202 => 
            array (
                'id' => 229,
                'paisnombre' => 'Somalia',
            ),
            203 => 
            array (
                'id' => 232,
                'paisnombre' => 'Sudán',
            ),
            204 => 
            array (
                'id' => 234,
                'paisnombre' => 'Swazilandia',
            ),
            205 => 
            array (
                'id' => 235,
                'paisnombre' => 'Tokelau',
            ),
            206 => 
            array (
                'id' => 236,
                'paisnombre' => 'Tonga',
            ),
            207 => 
            array (
                'id' => 237,
                'paisnombre' => 'Trinidad y Tobago',
            ),
            208 => 
            array (
                'id' => 239,
                'paisnombre' => 'Tuvalu',
            ),
            209 => 
            array (
                'id' => 240,
                'paisnombre' => 'Vanuatu',
            ),
            210 => 
            array (
                'id' => 241,
                'paisnombre' => 'Wallis y Futuna',
            ),
            211 => 
            array (
                'id' => 242,
                'paisnombre' => 'Sáhara Occidental',
            ),
            212 => 
            array (
                'id' => 243,
                'paisnombre' => 'Yemen',
            ),
            213 => 
            array (
                'id' => 246,
                'paisnombre' => 'Puerto Rico',
            ),
        ));
        
        
    }
}