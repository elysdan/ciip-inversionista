<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NacionalidadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nacionalidad')->delete();
        
        \DB::table('nacionalidad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'PAIS_NAC' => 'Afganistán',
                'GENTILICIO_NAC' => 'AFGANA/O',
                'ISO_NAC' => 'AFG',
            ),
            1 => 
            array (
                'id' => 2,
                'PAIS_NAC' => 'Albania',
                'GENTILICIO_NAC' => 'ALBANES/A',
                'ISO_NAC' => 'ALB',
            ),
            2 => 
            array (
                'id' => 3,
                'PAIS_NAC' => 'Alemania',
                'GENTILICIO_NAC' => 'ALEMAN/A',
                'ISO_NAC' => 'DEU',
            ),
            3 => 
            array (
                'id' => 4,
                'PAIS_NAC' => 'Andorra',
                'GENTILICIO_NAC' => 'ANDORRANA/O',
                'ISO_NAC' => 'AND',
            ),
            4 => 
            array (
                'id' => 5,
                'PAIS_NAC' => 'Angola',
                'GENTILICIO_NAC' => 'ANGOLEÑA/O',
                'ISO_NAC' => 'AGO',
            ),
            5 => 
            array (
                'id' => 6,
                'PAIS_NAC' => 'Antigua y Barbuda',
                'GENTILICIO_NAC' => 'ANTIGUANA/O',
                'ISO_NAC' => 'ATG',
            ),
            6 => 
            array (
                'id' => 7,
                'PAIS_NAC' => 'Arabia Saudita',
                'GENTILICIO_NAC' => 'SAUDÍ',
                'ISO_NAC' => 'SAU',
            ),
            7 => 
            array (
                'id' => 8,
                'PAIS_NAC' => 'Argelia',
                'GENTILICIO_NAC' => 'ARGELINA/O',
                'ISO_NAC' => 'DZA',
            ),
            8 => 
            array (
                'id' => 9,
                'PAIS_NAC' => 'Argentina',
                'GENTILICIO_NAC' => 'ARGENTINA/O',
                'ISO_NAC' => 'ARG',
            ),
            9 => 
            array (
                'id' => 10,
                'PAIS_NAC' => 'Armenia',
                'GENTILICIO_NAC' => 'ARMENIA/O',
                'ISO_NAC' => 'ARM',
            ),
            10 => 
            array (
                'id' => 11,
                'PAIS_NAC' => 'Aruba',
                'GENTILICIO_NAC' => 'ARUBEÑA/O',
                'ISO_NAC' => 'ABW',
            ),
            11 => 
            array (
                'id' => 12,
                'PAIS_NAC' => 'Australia',
                'GENTILICIO_NAC' => 'AUSTRALIANA/O',
                'ISO_NAC' => 'AUS',
            ),
            12 => 
            array (
                'id' => 13,
                'PAIS_NAC' => 'Austria',
                'GENTILICIO_NAC' => 'AUSTRIACA/O',
                'ISO_NAC' => 'AUT',
            ),
            13 => 
            array (
                'id' => 14,
                'PAIS_NAC' => 'Azerbaiyán',
                'GENTILICIO_NAC' => 'AZERBAIYANA/O',
                'ISO_NAC' => 'AZE',
            ),
            14 => 
            array (
                'id' => 15,
                'PAIS_NAC' => 'Bahamas',
                'GENTILICIO_NAC' => 'BAHAMEÑA',
                'ISO_NAC' => 'BHS',
            ),
            15 => 
            array (
                'id' => 16,
                'PAIS_NAC' => 'Bangladés',
                'GENTILICIO_NAC' => 'BANGLADESÍ',
                'ISO_NAC' => 'BGD',
            ),
            16 => 
            array (
                'id' => 17,
                'PAIS_NAC' => 'Barbados',
                'GENTILICIO_NAC' => 'BARBADENSE',
                'ISO_NAC' => 'BRB',
            ),
            17 => 
            array (
                'id' => 18,
                'PAIS_NAC' => 'Baréin',
                'GENTILICIO_NAC' => 'BAREINÍ',
                'ISO_NAC' => 'BHR',
            ),
            18 => 
            array (
                'id' => 19,
                'PAIS_NAC' => 'Bélgica',
                'GENTILICIO_NAC' => 'BELGA',
                'ISO_NAC' => 'BEL',
            ),
            19 => 
            array (
                'id' => 20,
                'PAIS_NAC' => 'Belice',
                'GENTILICIO_NAC' => 'BELICEÑA/O',
                'ISO_NAC' => 'BLZ',
            ),
            20 => 
            array (
                'id' => 21,
                'PAIS_NAC' => 'Benín',
                'GENTILICIO_NAC' => 'BENINÉS/A',
                'ISO_NAC' => 'BEN',
            ),
            21 => 
            array (
                'id' => 22,
                'PAIS_NAC' => 'Bielorrusia',
                'GENTILICIO_NAC' => 'BIELORRUSA/O',
                'ISO_NAC' => 'BLR',
            ),
            22 => 
            array (
                'id' => 23,
                'PAIS_NAC' => 'Birmania',
                'GENTILICIO_NAC' => 'BIRMANA/O',
                'ISO_NAC' => 'MMR',
            ),
            23 => 
            array (
                'id' => 24,
                'PAIS_NAC' => 'Bolivia',
                'GENTILICIO_NAC' => 'BOLIVIANA/O',
                'ISO_NAC' => 'BOL',
            ),
            24 => 
            array (
                'id' => 25,
                'PAIS_NAC' => 'Bosnia y Herzegovina',
                'GENTILICIO_NAC' => 'BOSNIA/O',
                'ISO_NAC' => 'BIH',
            ),
            25 => 
            array (
                'id' => 26,
                'PAIS_NAC' => 'Botsuana',
                'GENTILICIO_NAC' => 'BOTSUANA/O',
                'ISO_NAC' => 'BWA',
            ),
            26 => 
            array (
                'id' => 27,
                'PAIS_NAC' => 'Brasil',
                'GENTILICIO_NAC' => 'BRASILEÑA/O',
                'ISO_NAC' => 'BRA',
            ),
            27 => 
            array (
                'id' => 28,
                'PAIS_NAC' => 'Brunéi',
                'GENTILICIO_NAC' => 'BRUNEANA/O',
                'ISO_NAC' => 'BRN',
            ),
            28 => 
            array (
                'id' => 29,
                'PAIS_NAC' => 'Bulgaria',
                'GENTILICIO_NAC' => 'BÚLGARA/O',
                'ISO_NAC' => 'BGR',
            ),
            29 => 
            array (
                'id' => 30,
                'PAIS_NAC' => 'Burkina Faso',
                'GENTILICIO_NAC' => 'BURKINÉS',
                'ISO_NAC' => 'BFA',
            ),
            30 => 
            array (
                'id' => 31,
                'PAIS_NAC' => 'Burundi',
                'GENTILICIO_NAC' => 'BURUNDÉS/A',
                'ISO_NAC' => 'BDI',
            ),
            31 => 
            array (
                'id' => 32,
                'PAIS_NAC' => 'Bután',
                'GENTILICIO_NAC' => 'BUTANÉS/A',
                'ISO_NAC' => 'BTN',
            ),
            32 => 
            array (
                'id' => 33,
                'PAIS_NAC' => 'Cabo Verde',
                'GENTILICIO_NAC' => 'CABOVERDIANA/O',
                'ISO_NAC' => 'CPV',
            ),
            33 => 
            array (
                'id' => 34,
                'PAIS_NAC' => 'Camboya',
                'GENTILICIO_NAC' => 'CAMBOYANA/O',
                'ISO_NAC' => 'KHM',
            ),
            34 => 
            array (
                'id' => 35,
                'PAIS_NAC' => 'Camerún',
                'GENTILICIO_NAC' => 'CAMERUNES/A',
                'ISO_NAC' => 'CMR',
            ),
            35 => 
            array (
                'id' => 36,
                'PAIS_NAC' => 'Canadá',
                'GENTILICIO_NAC' => 'CANADIENSE',
                'ISO_NAC' => 'CAN',
            ),
            36 => 
            array (
                'id' => 37,
                'PAIS_NAC' => 'Catar',
                'GENTILICIO_NAC' => 'CATARÍ',
                'ISO_NAC' => 'QAT',
            ),
            37 => 
            array (
                'id' => 38,
                'PAIS_NAC' => 'Chad',
                'GENTILICIO_NAC' => 'CHADIANA/O',
                'ISO_NAC' => 'TCD',
            ),
            38 => 
            array (
                'id' => 39,
                'PAIS_NAC' => 'Chile',
                'GENTILICIO_NAC' => 'CHILENA/O',
                'ISO_NAC' => 'CHL',
            ),
            39 => 
            array (
                'id' => 40,
                'PAIS_NAC' => 'China',
                'GENTILICIO_NAC' => 'CHINA/O',
                'ISO_NAC' => 'CHN',
            ),
            40 => 
            array (
                'id' => 41,
                'PAIS_NAC' => 'Chipre',
                'GENTILICIO_NAC' => 'CHIPRIOTA',
                'ISO_NAC' => 'CYP',
            ),
            41 => 
            array (
                'id' => 42,
                'PAIS_NAC' => 'Ciudad del Vaticano',
                'GENTILICIO_NAC' => 'VATICANA/O',
                'ISO_NAC' => 'VAT',
            ),
            42 => 
            array (
                'id' => 43,
                'PAIS_NAC' => 'Colombia',
                'GENTILICIO_NAC' => 'COLOMBIANA/O',
                'ISO_NAC' => 'COL',
            ),
            43 => 
            array (
                'id' => 44,
                'PAIS_NAC' => 'Comoras',
                'GENTILICIO_NAC' => 'COMORENSE',
                'ISO_NAC' => 'COM',
            ),
            44 => 
            array (
                'id' => 45,
                'PAIS_NAC' => 'Corea del Norte',
                'GENTILICIO_NAC' => 'NORCOREANA/O',
                'ISO_NAC' => 'PRK',
            ),
            45 => 
            array (
                'id' => 46,
                'PAIS_NAC' => 'Corea del Sur',
                'GENTILICIO_NAC' => 'SURCOREANA/O',
                'ISO_NAC' => 'KOR',
            ),
            46 => 
            array (
                'id' => 47,
                'PAIS_NAC' => 'Costa de Marfil',
                'GENTILICIO_NAC' => 'MARFILEÑA/O',
                'ISO_NAC' => 'CIV',
            ),
            47 => 
            array (
                'id' => 48,
                'PAIS_NAC' => 'Costa Rica',
                'GENTILICIO_NAC' => 'COSTARRICENSE',
                'ISO_NAC' => 'CRI',
            ),
            48 => 
            array (
                'id' => 49,
                'PAIS_NAC' => 'Croacia',
                'GENTILICIO_NAC' => 'CROATA',
                'ISO_NAC' => 'HRV',
            ),
            49 => 
            array (
                'id' => 50,
                'PAIS_NAC' => 'Cuba',
                'GENTILICIO_NAC' => 'CUBANA/O',
                'ISO_NAC' => 'CUB',
            ),
            50 => 
            array (
                'id' => 51,
                'PAIS_NAC' => 'Dinamarca',
                'GENTILICIO_NAC' => 'DANÉSA/O',
                'ISO_NAC' => 'DNK',
            ),
            51 => 
            array (
                'id' => 52,
                'PAIS_NAC' => 'Dominica',
                'GENTILICIO_NAC' => 'DOMINIQUÉS/O',
                'ISO_NAC' => 'DMA',
            ),
            52 => 
            array (
                'id' => 53,
                'PAIS_NAC' => 'Ecuador',
                'GENTILICIO_NAC' => 'ECUATORIANA/O',
                'ISO_NAC' => 'ECU',
            ),
            53 => 
            array (
                'id' => 54,
                'PAIS_NAC' => 'Egipto',
                'GENTILICIO_NAC' => 'EGIPCIA/O',
                'ISO_NAC' => 'EGY',
            ),
            54 => 
            array (
                'id' => 55,
                'PAIS_NAC' => 'El Salvador',
                'GENTILICIO_NAC' => 'SALVADOREÑA/O',
                'ISO_NAC' => 'SLV',
            ),
            55 => 
            array (
                'id' => 56,
                'PAIS_NAC' => 'Emiratos Árabes Unidos',
                'GENTILICIO_NAC' => 'EMIRATÍ',
                'ISO_NAC' => 'ARE',
            ),
            56 => 
            array (
                'id' => 57,
                'PAIS_NAC' => 'Eritrea',
                'GENTILICIO_NAC' => 'ERITREA/O',
                'ISO_NAC' => 'ERI',
            ),
            57 => 
            array (
                'id' => 58,
                'PAIS_NAC' => 'Eslovaquia',
                'GENTILICIO_NAC' => 'ESLOVACA/O',
                'ISO_NAC' => 'SVK',
            ),
            58 => 
            array (
                'id' => 59,
                'PAIS_NAC' => 'Eslovenia',
                'GENTILICIO_NAC' => 'ESLOVENA/O',
                'ISO_NAC' => 'SVN',
            ),
            59 => 
            array (
                'id' => 60,
                'PAIS_NAC' => 'España',
                'GENTILICIO_NAC' => 'ESPAÑOL/A',
                'ISO_NAC' => 'ESP',
            ),
            60 => 
            array (
                'id' => 61,
                'PAIS_NAC' => 'Estados Unidos',
                'GENTILICIO_NAC' => 'ESTADOUNIDENSE',
                'ISO_NAC' => 'USA',
            ),
            61 => 
            array (
                'id' => 62,
                'PAIS_NAC' => 'Estonia',
                'GENTILICIO_NAC' => 'ESTONIA/O',
                'ISO_NAC' => 'EST',
            ),
            62 => 
            array (
                'id' => 63,
                'PAIS_NAC' => 'Etiopía',
                'GENTILICIO_NAC' => 'ETÍOPE',
                'ISO_NAC' => 'ETH',
            ),
            63 => 
            array (
                'id' => 64,
                'PAIS_NAC' => 'Filipinas',
                'GENTILICIO_NAC' => 'FILIPINA/O',
                'ISO_NAC' => 'PHL',
            ),
            64 => 
            array (
                'id' => 65,
                'PAIS_NAC' => 'Finlandia',
                'GENTILICIO_NAC' => 'FINLANDÉS/A',
                'ISO_NAC' => 'FIN',
            ),
            65 => 
            array (
                'id' => 66,
                'PAIS_NAC' => 'Fiyi',
                'GENTILICIO_NAC' => 'FIYIANA/O',
                'ISO_NAC' => 'FJI',
            ),
            66 => 
            array (
                'id' => 67,
                'PAIS_NAC' => 'Francia',
                'GENTILICIO_NAC' => 'FRANCÉS/A',
                'ISO_NAC' => 'FRA',
            ),
            67 => 
            array (
                'id' => 68,
                'PAIS_NAC' => 'Gabón',
                'GENTILICIO_NAC' => 'GABONÉSA/O',
                'ISO_NAC' => 'GAB',
            ),
            68 => 
            array (
                'id' => 69,
                'PAIS_NAC' => 'Gambia',
                'GENTILICIO_NAC' => 'GAMBIANA/O',
                'ISO_NAC' => 'GMB',
            ),
            69 => 
            array (
                'id' => 70,
                'PAIS_NAC' => 'Georgia',
                'GENTILICIO_NAC' => 'GEORGIANA/O',
                'ISO_NAC' => 'GEO',
            ),
            70 => 
            array (
                'id' => 71,
                'PAIS_NAC' => 'Gibraltar',
                'GENTILICIO_NAC' => 'GIBRALTAREÑA/O',
                'ISO_NAC' => 'GIB',
            ),
            71 => 
            array (
                'id' => 72,
                'PAIS_NAC' => 'Ghana',
                'GENTILICIO_NAC' => 'GHANÉS/A',
                'ISO_NAC' => 'GHA',
            ),
            72 => 
            array (
                'id' => 73,
                'PAIS_NAC' => 'Granada',
                'GENTILICIO_NAC' => 'GRANADINA/O',
                'ISO_NAC' => 'GRD',
            ),
            73 => 
            array (
                'id' => 74,
                'PAIS_NAC' => 'Grecia',
                'GENTILICIO_NAC' => 'GRIEGA/O',
                'ISO_NAC' => 'GRC',
            ),
            74 => 
            array (
                'id' => 75,
                'PAIS_NAC' => 'Groenlandia',
                'GENTILICIO_NAC' => 'GROENLANDÉS/A',
                'ISO_NAC' => 'GRL',
            ),
            75 => 
            array (
                'id' => 76,
                'PAIS_NAC' => 'Guatemala',
                'GENTILICIO_NAC' => 'GUATEMALTECA/O',
                'ISO_NAC' => 'GTM',
            ),
            76 => 
            array (
                'id' => 77,
                'PAIS_NAC' => 'Guineae cuatorial',
                'GENTILICIO_NAC' => 'ECUATOGUINEANA/O',
                'ISO_NAC' => 'GNQ',
            ),
            77 => 
            array (
                'id' => 78,
                'PAIS_NAC' => 'Guinea',
                'GENTILICIO_NAC' => 'GUINEANA/O',
                'ISO_NAC' => 'GIN',
            ),
            78 => 
            array (
                'id' => 79,
                'PAIS_NAC' => 'Guinea-Bisáu',
                'GENTILICIO_NAC' => 'GUINEANA/O',
                'ISO_NAC' => 'GNB',
            ),
            79 => 
            array (
                'id' => 80,
                'PAIS_NAC' => 'Guyana',
                'GENTILICIO_NAC' => 'GUYANESA/O',
                'ISO_NAC' => 'GUY',
            ),
            80 => 
            array (
                'id' => 90,
                'PAIS_NAC' => 'Haití',
                'GENTILICIO_NAC' => 'HAITIANA/O',
                'ISO_NAC' => 'HTI',
            ),
            81 => 
            array (
                'id' => 91,
                'PAIS_NAC' => 'Honduras',
                'GENTILICIO_NAC' => 'HONDUREÑA/O',
                'ISO_NAC' => 'HND',
            ),
            82 => 
            array (
                'id' => 93,
                'PAIS_NAC' => 'Hungría',
                'GENTILICIO_NAC' => 'HÚNGARA/O',
                'ISO_NAC' => 'HUN',
            ),
            83 => 
            array (
                'id' => 94,
                'PAIS_NAC' => 'India',
                'GENTILICIO_NAC' => 'HINDÚ',
                'ISO_NAC' => 'IND',
            ),
            84 => 
            array (
                'id' => 95,
                'PAIS_NAC' => 'Indonesia',
                'GENTILICIO_NAC' => 'INDONESIA/O',
                'ISO_NAC' => 'IDN',
            ),
            85 => 
            array (
                'id' => 96,
                'PAIS_NAC' => 'Irak',
                'GENTILICIO_NAC' => 'IRAQUÍ',
                'ISO_NAC' => 'IRQ',
            ),
            86 => 
            array (
                'id' => 97,
                'PAIS_NAC' => 'Irán',
                'GENTILICIO_NAC' => 'IRANÍ',
                'ISO_NAC' => 'IRN',
            ),
            87 => 
            array (
                'id' => 98,
                'PAIS_NAC' => 'Irlanda',
                'GENTILICIO_NAC' => 'IRLANDÉS/A',
                'ISO_NAC' => 'IRL',
            ),
            88 => 
            array (
                'id' => 99,
                'PAIS_NAC' => 'Islandia',
                'GENTILICIO_NAC' => 'ISLANDÉS/A',
                'ISO_NAC' => 'ISL',
            ),
            89 => 
            array (
                'id' => 100,
                'PAIS_NAC' => 'Islas Cook',
                'GENTILICIO_NAC' => 'COOKIANA/O',
                'ISO_NAC' => 'COK',
            ),
            90 => 
            array (
                'id' => 101,
                'PAIS_NAC' => 'Islas Marshall',
                'GENTILICIO_NAC' => 'MARSHALÉS/A',
                'ISO_NAC' => 'MHL',
            ),
            91 => 
            array (
                'id' => 102,
                'PAIS_NAC' => 'Islas Salomón',
                'GENTILICIO_NAC' => 'SALOMONENSE',
                'ISO_NAC' => 'SLB',
            ),
            92 => 
            array (
                'id' => 103,
                'PAIS_NAC' => 'Israel',
                'GENTILICIO_NAC' => 'ISRAELÍ',
                'ISO_NAC' => 'ISR',
            ),
            93 => 
            array (
                'id' => 104,
                'PAIS_NAC' => 'Italia',
                'GENTILICIO_NAC' => 'ITALIANA/O',
                'ISO_NAC' => 'ITA',
            ),
            94 => 
            array (
                'id' => 105,
                'PAIS_NAC' => 'Jamaica',
                'GENTILICIO_NAC' => 'JAMAIQUINA/O',
                'ISO_NAC' => 'JAM',
            ),
            95 => 
            array (
                'id' => 106,
                'PAIS_NAC' => 'Japón',
                'GENTILICIO_NAC' => 'JAPONÉS/A',
                'ISO_NAC' => 'JPN',
            ),
            96 => 
            array (
                'id' => 107,
                'PAIS_NAC' => 'Jordania',
                'GENTILICIO_NAC' => 'JORDANA/O',
                'ISO_NAC' => 'JOR',
            ),
            97 => 
            array (
                'id' => 108,
                'PAIS_NAC' => 'Kazajistán',
                'GENTILICIO_NAC' => 'KAZAJA/O',
                'ISO_NAC' => 'KAZ',
            ),
            98 => 
            array (
                'id' => 109,
                'PAIS_NAC' => 'Kenia',
                'GENTILICIO_NAC' => 'KENIATA/O',
                'ISO_NAC' => 'KEN',
            ),
            99 => 
            array (
                'id' => 110,
                'PAIS_NAC' => 'Kirguistán',
                'GENTILICIO_NAC' => 'KIRGUISA/O',
                'ISO_NAC' => 'KGZ',
            ),
            100 => 
            array (
                'id' => 111,
                'PAIS_NAC' => 'Kiribati',
                'GENTILICIO_NAC' => 'KIRIBATIANA/O',
                'ISO_NAC' => 'KIR',
            ),
            101 => 
            array (
                'id' => 112,
                'PAIS_NAC' => 'Kuwait',
                'GENTILICIO_NAC' => 'KUWAITÍ',
                'ISO_NAC' => 'KWT',
            ),
            102 => 
            array (
                'id' => 113,
                'PAIS_NAC' => 'Laos',
                'GENTILICIO_NAC' => 'LAOSIANA/O',
                'ISO_NAC' => 'LAO',
            ),
            103 => 
            array (
                'id' => 114,
                'PAIS_NAC' => 'Lesoto',
                'GENTILICIO_NAC' => 'LESOTENSE',
                'ISO_NAC' => 'LSO',
            ),
            104 => 
            array (
                'id' => 115,
                'PAIS_NAC' => 'Letonia',
                'GENTILICIO_NAC' => 'LETÓN/A',
                'ISO_NAC' => 'LVA',
            ),
            105 => 
            array (
                'id' => 116,
                'PAIS_NAC' => 'Líbano',
                'GENTILICIO_NAC' => 'LIBANÉS/A',
                'ISO_NAC' => 'LBN',
            ),
            106 => 
            array (
                'id' => 117,
                'PAIS_NAC' => 'Liberia',
                'GENTILICIO_NAC' => 'LIBERIANA/O',
                'ISO_NAC' => 'LBR',
            ),
            107 => 
            array (
                'id' => 118,
                'PAIS_NAC' => 'Libia',
                'GENTILICIO_NAC' => 'LIBIA/O',
                'ISO_NAC' => 'LBY',
            ),
            108 => 
            array (
                'id' => 119,
                'PAIS_NAC' => 'Liechtenstein',
                'GENTILICIO_NAC' => 'LIECHTENSTEINIANA/O',
                'ISO_NAC' => 'LIE',
            ),
            109 => 
            array (
                'id' => 120,
                'PAIS_NAC' => 'Lituania',
                'GENTILICIO_NAC' => 'LITUANA/O',
                'ISO_NAC' => 'LTU',
            ),
            110 => 
            array (
                'id' => 121,
                'PAIS_NAC' => 'Luxemburgo',
                'GENTILICIO_NAC' => 'LUXEMBURGUÉS/A',
                'ISO_NAC' => 'LUX',
            ),
            111 => 
            array (
                'id' => 122,
                'PAIS_NAC' => 'Madagascar',
                'GENTILICIO_NAC' => 'MALGACHE',
                'ISO_NAC' => 'MDG',
            ),
            112 => 
            array (
                'id' => 123,
                'PAIS_NAC' => 'Malasia',
                'GENTILICIO_NAC' => 'MALASIA/O',
                'ISO_NAC' => 'MYS',
            ),
            113 => 
            array (
                'id' => 124,
                'PAIS_NAC' => 'Malaui',
                'GENTILICIO_NAC' => 'MALAUÍ',
                'ISO_NAC' => 'MWI',
            ),
            114 => 
            array (
                'id' => 125,
                'PAIS_NAC' => 'Maldivas',
                'GENTILICIO_NAC' => 'MALDIVA/O',
                'ISO_NAC' => 'MDV',
            ),
            115 => 
            array (
                'id' => 126,
                'PAIS_NAC' => 'Malí',
                'GENTILICIO_NAC' => 'MALIENSE',
                'ISO_NAC' => 'MLI',
            ),
            116 => 
            array (
                'id' => 127,
                'PAIS_NAC' => 'Malta',
                'GENTILICIO_NAC' => 'MALTÉS/A',
                'ISO_NAC' => 'MLT',
            ),
            117 => 
            array (
                'id' => 128,
                'PAIS_NAC' => 'Marruecos',
                'GENTILICIO_NAC' => 'MARROQUÍ',
                'ISO_NAC' => 'MAR',
            ),
            118 => 
            array (
                'id' => 129,
                'PAIS_NAC' => 'Martinica',
                'GENTILICIO_NAC' => 'MARTINIQUÉS',
                'ISO_NAC' => 'MTQ',
            ),
            119 => 
            array (
                'id' => 130,
                'PAIS_NAC' => 'Mauricio',
                'GENTILICIO_NAC' => 'MAURICIANA/O',
                'ISO_NAC' => 'MUS',
            ),
            120 => 
            array (
                'id' => 131,
                'PAIS_NAC' => 'Mauritania',
                'GENTILICIO_NAC' => 'MAURITANA/O',
                'ISO_NAC' => 'MRT',
            ),
            121 => 
            array (
                'id' => 132,
                'PAIS_NAC' => 'México',
                'GENTILICIO_NAC' => 'MEXICANA/O',
                'ISO_NAC' => 'MEX',
            ),
            122 => 
            array (
                'id' => 133,
                'PAIS_NAC' => 'Micronesia',
                'GENTILICIO_NAC' => 'MICRONESIA/O',
                'ISO_NAC' => 'FSM',
            ),
            123 => 
            array (
                'id' => 134,
                'PAIS_NAC' => 'Moldavia',
                'GENTILICIO_NAC' => 'MOLDAVA/O',
                'ISO_NAC' => 'MDA',
            ),
            124 => 
            array (
                'id' => 135,
                'PAIS_NAC' => 'Mónaco',
                'GENTILICIO_NAC' => 'MONEGASCA/O',
                'ISO_NAC' => 'MCO',
            ),
            125 => 
            array (
                'id' => 136,
                'PAIS_NAC' => 'Mongolia',
                'GENTILICIO_NAC' => 'MONGOL/A',
                'ISO_NAC' => 'MNG',
            ),
            126 => 
            array (
                'id' => 137,
                'PAIS_NAC' => 'Monte negro',
                'GENTILICIO_NAC' => 'MONTENEGRINA/O',
                'ISO_NAC' => 'MNE',
            ),
            127 => 
            array (
                'id' => 138,
                'PAIS_NAC' => 'Mozambique',
                'GENTILICIO_NAC' => 'MOZAMBIQUEÑA/O',
                'ISO_NAC' => 'MOZ',
            ),
            128 => 
            array (
                'id' => 139,
                'PAIS_NAC' => 'Namibia',
                'GENTILICIO_NAC' => 'NAMIBIA/O',
                'ISO_NAC' => 'NAM',
            ),
            129 => 
            array (
                'id' => 140,
                'PAIS_NAC' => 'Nauru',
                'GENTILICIO_NAC' => 'NAURUANA/O',
                'ISO_NAC' => 'NRU',
            ),
            130 => 
            array (
                'id' => 141,
                'PAIS_NAC' => 'Nepal',
                'GENTILICIO_NAC' => 'NEPALÍ',
                'ISO_NAC' => 'NPL',
            ),
            131 => 
            array (
                'id' => 142,
                'PAIS_NAC' => 'Nicaragua',
                'GENTILICIO_NAC' => 'NICARAGÜENSE',
                'ISO_NAC' => 'NIC',
            ),
            132 => 
            array (
                'id' => 143,
                'PAIS_NAC' => 'Níger',
                'GENTILICIO_NAC' => 'NIGERINA/O',
                'ISO_NAC' => 'NER',
            ),
            133 => 
            array (
                'id' => 144,
                'PAIS_NAC' => 'Nigeria',
                'GENTILICIO_NAC' => 'NIGERIANA/O',
                'ISO_NAC' => 'NGA',
            ),
            134 => 
            array (
                'id' => 145,
                'PAIS_NAC' => 'Noruega',
                'GENTILICIO_NAC' => 'NORUEGA/O',
                'ISO_NAC' => 'NOR',
            ),
            135 => 
            array (
                'id' => 146,
                'PAIS_NAC' => 'Nueva Zelanda',
                'GENTILICIO_NAC' => 'NEOZELANDÉS/A',
                'ISO_NAC' => 'NZL',
            ),
            136 => 
            array (
                'id' => 147,
                'PAIS_NAC' => 'Omán',
                'GENTILICIO_NAC' => 'OMANÍ',
                'ISO_NAC' => 'OMN',
            ),
            137 => 
            array (
                'id' => 148,
                'PAIS_NAC' => 'Países Bajos',
                'GENTILICIO_NAC' => 'NEERLANDÉS/A',
                'ISO_NAC' => 'NLD',
            ),
            138 => 
            array (
                'id' => 149,
                'PAIS_NAC' => 'Pakistán',
                'GENTILICIO_NAC' => 'PAKISTANÍ',
                'ISO_NAC' => 'PAK',
            ),
            139 => 
            array (
                'id' => 150,
                'PAIS_NAC' => 'Palaos',
                'GENTILICIO_NAC' => 'PALAUANA/O',
                'ISO_NAC' => 'PLW',
            ),
            140 => 
            array (
                'id' => 151,
                'PAIS_NAC' => 'Palestina',
                'GENTILICIO_NAC' => 'PALESTINA/O',
                'ISO_NAC' => 'PSE',
            ),
            141 => 
            array (
                'id' => 152,
                'PAIS_NAC' => 'Panamá',
                'GENTILICIO_NAC' => 'PANAMEÑA/O',
                'ISO_NAC' => 'PAN',
            ),
            142 => 
            array (
                'id' => 153,
                'PAIS_NAC' => 'Papúa Nueva Guinea',
                'GENTILICIO_NAC' => 'PAPÚ',
                'ISO_NAC' => 'PNG',
            ),
            143 => 
            array (
                'id' => 154,
                'PAIS_NAC' => 'Paraguay',
                'GENTILICIO_NAC' => 'PARAGUAYA/O',
                'ISO_NAC' => 'PRY',
            ),
            144 => 
            array (
                'id' => 155,
                'PAIS_NAC' => 'Perú',
                'GENTILICIO_NAC' => 'PERUANA/O',
                'ISO_NAC' => 'PER',
            ),
            145 => 
            array (
                'id' => 156,
                'PAIS_NAC' => 'Polonia',
                'GENTILICIO_NAC' => 'POLACA/O',
                'ISO_NAC' => 'POL',
            ),
            146 => 
            array (
                'id' => 157,
                'PAIS_NAC' => 'Portugal',
                'GENTILICIO_NAC' => 'PORTUGUÉS/A',
                'ISO_NAC' => 'PRT',
            ),
            147 => 
            array (
                'id' => 158,
                'PAIS_NAC' => 'Puerto Rico',
                'GENTILICIO_NAC' => 'PUERTORRIQUEÑA/O',
                'ISO_NAC' => 'PRI',
            ),
            148 => 
            array (
                'id' => 159,
                'PAIS_NAC' => 'Reino Unido',
                'GENTILICIO_NAC' => 'BRITÁNICA/O',
                'ISO_NAC' => 'GBR',
            ),
            149 => 
            array (
                'id' => 160,
                'PAIS_NAC' => 'República Centro africana',
                'GENTILICIO_NAC' => 'CENTROAFRICANA/O',
                'ISO_NAC' => 'CAF',
            ),
            150 => 
            array (
                'id' => 161,
                'PAIS_NAC' => 'República Checa',
                'GENTILICIO_NAC' => 'CHECA/O',
                'ISO_NAC' => 'CZE',
            ),
            151 => 
            array (
                'id' => 162,
                'PAIS_NAC' => 'República de Macedonia',
                'GENTILICIO_NAC' => 'MACEDONIA/O',
                'ISO_NAC' => 'MKD',
            ),
            152 => 
            array (
                'id' => 163,
                'PAIS_NAC' => 'República del Congo',
                'GENTILICIO_NAC' => 'CONGOLEÑA/O',
                'ISO_NAC' => 'COG',
            ),
            153 => 
            array (
                'id' => 164,
                'PAIS_NAC' => 'República Democrática del Congo',
                'GENTILICIO_NAC' => 'CONGOLEÑA/O',
                'ISO_NAC' => 'COD',
            ),
            154 => 
            array (
                'id' => 165,
                'PAIS_NAC' => 'República Dominicana',
                'GENTILICIO_NAC' => 'DOMINICANA/O',
                'ISO_NAC' => 'DOM',
            ),
            155 => 
            array (
                'id' => 166,
                'PAIS_NAC' => 'República Sudafricana',
                'GENTILICIO_NAC' => 'SUDAFRICANA/O',
                'ISO_NAC' => 'ZAF',
            ),
            156 => 
            array (
                'id' => 167,
                'PAIS_NAC' => 'Ruanda',
                'GENTILICIO_NAC' => 'RUANDÉSA/O',
                'ISO_NAC' => 'RWA',
            ),
            157 => 
            array (
                'id' => 168,
                'PAIS_NAC' => 'Rumanía',
                'GENTILICIO_NAC' => 'RUMANA/O',
                'ISO_NAC' => 'ROU',
            ),
            158 => 
            array (
                'id' => 169,
                'PAIS_NAC' => 'Rusia',
                'GENTILICIO_NAC' => 'RUSA/O',
                'ISO_NAC' => 'RUS',
            ),
            159 => 
            array (
                'id' => 170,
                'PAIS_NAC' => 'Samoa',
                'GENTILICIO_NAC' => 'SAMOANA/O',
                'ISO_NAC' => 'WSM',
            ),
            160 => 
            array (
                'id' => 171,
                'PAIS_NAC' => 'San Cristóbal y Nieves',
                'GENTILICIO_NAC' => 'CRISTOBALEÑA/O',
                'ISO_NAC' => 'KNA',
            ),
            161 => 
            array (
                'id' => 172,
                'PAIS_NAC' => 'San Marino',
                'GENTILICIO_NAC' => 'SANMARINENSE',
                'ISO_NAC' => 'SMR',
            ),
            162 => 
            array (
                'id' => 173,
                'PAIS_NAC' => 'San Vicente y las Granadinas',
                'GENTILICIO_NAC' => 'SANVICENTINA/O',
                'ISO_NAC' => 'VCT',
            ),
            163 => 
            array (
                'id' => 174,
                'PAIS_NAC' => 'Santa Lucía',
                'GENTILICIO_NAC' => 'SANTALUCENSE',
                'ISO_NAC' => 'LCA',
            ),
            164 => 
            array (
                'id' => 175,
                'PAIS_NAC' => 'Santo Tomé y Príncipe',
                'GENTILICIO_NAC' => 'SANTOTOMENSE',
                'ISO_NAC' => 'STP',
            ),
            165 => 
            array (
                'id' => 176,
                'PAIS_NAC' => 'Senegal',
                'GENTILICIO_NAC' => 'SENEGALÉS/A',
                'ISO_NAC' => 'SEN',
            ),
            166 => 
            array (
                'id' => 177,
                'PAIS_NAC' => 'Serbia',
                'GENTILICIO_NAC' => 'SERBIA/O',
                'ISO_NAC' => 'SRB',
            ),
            167 => 
            array (
                'id' => 178,
                'PAIS_NAC' => 'Seychelles',
                'GENTILICIO_NAC' => 'SEYCHELLENSE',
                'ISO_NAC' => 'SYC',
            ),
            168 => 
            array (
                'id' => 179,
                'PAIS_NAC' => 'Sierra Leona',
                'GENTILICIO_NAC' => 'SIERRA LEONÉS/A',
                'ISO_NAC' => 'SLE',
            ),
            169 => 
            array (
                'id' => 180,
                'PAIS_NAC' => 'Singapur',
                'GENTILICIO_NAC' => 'SINGAPURENSE',
                'ISO_NAC' => 'SGP',
            ),
            170 => 
            array (
                'id' => 181,
                'PAIS_NAC' => 'Siria',
                'GENTILICIO_NAC' => 'SIRIA/O',
                'ISO_NAC' => 'SYR',
            ),
            171 => 
            array (
                'id' => 182,
                'PAIS_NAC' => 'Somalia',
                'GENTILICIO_NAC' => 'SOMALÍ/O',
                'ISO_NAC' => 'SOM',
            ),
            172 => 
            array (
                'id' => 183,
                'PAIS_NAC' => 'SriLanka',
                'GENTILICIO_NAC' => 'CEILANÉS/A',
                'ISO_NAC' => 'LKA',
            ),
            173 => 
            array (
                'id' => 184,
                'PAIS_NAC' => 'Suazilandia',
                'GENTILICIO_NAC' => 'SUAZI',
                'ISO_NAC' => 'SWZ',
            ),
            174 => 
            array (
                'id' => 185,
                'PAIS_NAC' => 'Sudán del Sur',
                'GENTILICIO_NAC' => 'SUR SUDANÉS/A',
                'ISO_NAC' => 'SSD',
            ),
            175 => 
            array (
                'id' => 186,
                'PAIS_NAC' => 'Sudán',
                'GENTILICIO_NAC' => 'SUDANÉS/A',
                'ISO_NAC' => 'SDN',
            ),
            176 => 
            array (
                'id' => 187,
                'PAIS_NAC' => 'Suecia',
                'GENTILICIO_NAC' => 'SUECA/O',
                'ISO_NAC' => 'SWE',
            ),
            177 => 
            array (
                'id' => 188,
                'PAIS_NAC' => 'Suiza',
                'GENTILICIO_NAC' => 'SUIZA/O',
                'ISO_NAC' => 'CHE',
            ),
            178 => 
            array (
                'id' => 189,
                'PAIS_NAC' => 'Surinam',
                'GENTILICIO_NAC' => 'SURINAMES/A',
                'ISO_NAC' => 'SUR',
            ),
            179 => 
            array (
                'id' => 190,
                'PAIS_NAC' => 'Tailandia',
                'GENTILICIO_NAC' => 'TAILANDÉS/A',
                'ISO_NAC' => 'THA',
            ),
            180 => 
            array (
                'id' => 191,
                'PAIS_NAC' => 'Tanzania',
                'GENTILICIO_NAC' => 'TANZANA/O',
                'ISO_NAC' => 'TZA',
            ),
            181 => 
            array (
                'id' => 192,
                'PAIS_NAC' => 'Tayikistán',
                'GENTILICIO_NAC' => 'TAYIKA/O',
                'ISO_NAC' => 'TJK',
            ),
            182 => 
            array (
                'id' => 193,
                'PAIS_NAC' => 'Timor Oriental',
                'GENTILICIO_NAC' => 'TIMORENSE',
                'ISO_NAC' => 'TLS',
            ),
            183 => 
            array (
                'id' => 194,
                'PAIS_NAC' => 'Togo',
                'GENTILICIO_NAC' => 'TOGOLÉSA/O',
                'ISO_NAC' => 'TGO',
            ),
            184 => 
            array (
                'id' => 195,
                'PAIS_NAC' => 'Tonga',
                'GENTILICIO_NAC' => 'TONGANA/O',
                'ISO_NAC' => 'TON',
            ),
            185 => 
            array (
                'id' => 196,
                'PAIS_NAC' => 'Trinidad y Tobago',
                'GENTILICIO_NAC' => 'TRINITENSE',
                'ISO_NAC' => 'TTO',
            ),
            186 => 
            array (
                'id' => 197,
                'PAIS_NAC' => 'Túnez',
                'GENTILICIO_NAC' => 'TUNECINA/O',
                'ISO_NAC' => 'TUN',
            ),
            187 => 
            array (
                'id' => 198,
                'PAIS_NAC' => 'Turkmenistán',
                'GENTILICIO_NAC' => 'TURCOMANA/O',
                'ISO_NAC' => 'TKM',
            ),
            188 => 
            array (
                'id' => 199,
                'PAIS_NAC' => 'Turquía',
                'GENTILICIO_NAC' => 'TURCA/O',
                'ISO_NAC' => 'TUR',
            ),
            189 => 
            array (
                'id' => 200,
                'PAIS_NAC' => 'Tuvalu',
                'GENTILICIO_NAC' => 'TUVALUANAO/',
                'ISO_NAC' => 'TUV',
            ),
            190 => 
            array (
                'id' => 201,
                'PAIS_NAC' => 'Ucrania',
                'GENTILICIO_NAC' => 'UCRANIANA/O',
                'ISO_NAC' => 'UKR',
            ),
            191 => 
            array (
                'id' => 202,
                'PAIS_NAC' => 'Uganda',
                'GENTILICIO_NAC' => 'UGANDÉSA/O',
                'ISO_NAC' => 'UGA',
            ),
            192 => 
            array (
                'id' => 203,
                'PAIS_NAC' => 'Uruguay',
                'GENTILICIO_NAC' => 'URUGUAYA/O',
                'ISO_NAC' => 'URY',
            ),
            193 => 
            array (
                'id' => 204,
                'PAIS_NAC' => 'Uzbekistán',
                'GENTILICIO_NAC' => 'UZBEKA/O',
                'ISO_NAC' => 'UZB',
            ),
            194 => 
            array (
                'id' => 205,
                'PAIS_NAC' => 'Vanuatu',
                'GENTILICIO_NAC' => 'VANUATUENSE',
                'ISO_NAC' => 'VUT',
            ),
            195 => 
            array (
                'id' => 206,
                'PAIS_NAC' => 'Venezuela',
                'GENTILICIO_NAC' => 'VENEZOLANA/O',
                'ISO_NAC' => 'VEN',
            ),
            196 => 
            array (
                'id' => 207,
                'PAIS_NAC' => 'Vietnam',
                'GENTILICIO_NAC' => 'VIETNAMITA',
                'ISO_NAC' => 'VNM',
            ),
            197 => 
            array (
                'id' => 208,
                'PAIS_NAC' => 'Yemen',
                'GENTILICIO_NAC' => 'YEMENÍ',
                'ISO_NAC' => 'YEM',
            ),
            198 => 
            array (
                'id' => 209,
                'PAIS_NAC' => 'Yibuti',
                'GENTILICIO_NAC' => 'YIBUTIANA',
                'ISO_NAC' => 'DJI',
            ),
            199 => 
            array (
                'id' => 210,
                'PAIS_NAC' => 'Zambia',
                'GENTILICIO_NAC' => 'ZAMBIANO',
                'ISO_NAC' => 'ZMB',
            ),
            200 => 
            array (
                'id' => 211,
                'PAIS_NAC' => 'Zimbabue',
                'GENTILICIO_NAC' => 'ZIMBABUENSE',
                'ISO_NAC' => 'ZWE',
            ),
        ));
        
        
    }
}