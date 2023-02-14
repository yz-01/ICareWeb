<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NatureBusinessesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nature_businesses')->delete();
        
        \DB::table('nature_businesses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Growing and manufacturing of tea',
                'created_at' => '2023-02-14 13:53:04',
                'updated_at' => '2023-02-14 13:53:04',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Growing and manufacturing of coffee',
                'created_at' => '2023-02-14 13:53:13',
                'updated_at' => '2023-02-14 13:53:13',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Growing and manufacturing of rubber',
                'created_at' => '2023-02-14 13:53:42',
                'updated_at' => '2023-02-14 13:53:42',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Market gardening and horticulture specialties',
                'created_at' => '2023-02-14 13:53:44',
                'updated_at' => '2023-02-14 13:53:44',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Raising of silk worms and production of silk',
                'created_at' => '2023-02-14 14:45:48',
                'updated_at' => '2023-02-14 14:45:48',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Raising of bees and production of honey',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Raising of poultry and production of eggs',
                'created_at' => '2023-02-14 14:45:50',
                'updated_at' => '2023-02-14 14:45:51',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Rearing of sheep and production of wool',
                'created_at' => '2023-02-14 14:45:51',
                'updated_at' => '2023-02-14 14:45:51',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Rearing of animals and production of animal products',
                'created_at' => '2023-02-14 14:45:51',
                'updated_at' => '2023-02-14 14:45:52',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Agricultural and animal husbandry services',
                'created_at' => '2023-02-14 14:45:52',
                'updated_at' => '2023-02-14 14:45:52',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Soil conservation, soil testing and soil desalination services',
                'created_at' => '2023-02-14 14:45:53',
                'updated_at' => '2023-02-14 14:45:53',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Hunting, trapping and game propagation services',
                'created_at' => '2023-02-14 14:45:54',
                'updated_at' => '2023-02-14 14:45:54',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Growing of timber, plantation, operation of tree nurseries and conserving of forest',
                'created_at' => '2023-02-14 14:47:30',
                'updated_at' => '2023-02-14 14:47:30',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Gathering of tendu leaves',
                'created_at' => '2023-02-14 14:47:31',
                'updated_at' => '2023-02-14 14:47:31',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Gathering of other wild growing materials',
                'created_at' => '2023-02-14 14:47:31',
                'updated_at' => '2023-02-14 14:47:32',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Forestry service activities, timber cruising, afforestation and reforestation',
                'created_at' => '2023-02-14 14:47:33',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Logging service activities, transport of logs within the forest',
                'created_at' => '2023-02-14 14:47:33',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Other agriculture, animal husbandry or forestry activity n.e.c',
                'created_at' => '2023-02-14 14:47:33',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Fishing on commercial basis in inland waters',
                'created_at' => '2023-02-14 14:47:33',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Fishing on commercial basis in ocean and coastal areas',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Fish farming',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Gathering of marine materials such as natural pearls, sponges, coral etc.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Services related to marine and fresh water fisheries, fish hatcheries and fish farms',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Other Fish farming activity n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Mining and agglomeration of lignite',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Extraction and agglomeration of peat',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Extraction of crude petroleum and natural gas',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Service activities incidental to oil and gas extraction excluding surveying',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:48:29',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Mining of uranium and thorium ores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Mining of iron ores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Mining of non-ferrous metal ores, except uranium and thorium ores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Mining of gemstones',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Mining of chemical and fertilizer minerals',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Mining of quarrying of abrasive materials',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Mining of mica, graphite and asbestos',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
            'name' => 'Quarrying of stones (marble/granite/dolomite), sand and clay',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Other mining and quarrying',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Mining and production of salt',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Other mining and quarrying n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Production, processing and preservation of meat and meat products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Production, processing and preservation of fish and fish products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Manufacture of vegetable oil, animal oil and fats',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Processing of fruits, vegetables and edible nuts',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Manufacture of dairy products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Manufacture of sugar',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Manufacture of cocoa, chocolates and sugar confectionery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Flour milling',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Rice milling',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Dal milling',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Manufacture of other grain mill products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Manufacture of bakery products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Manufacture of starch products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Manufacture of animal feeds',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Manufacture of other food products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Manufacture of other food products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Manufacturing of wines',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Manufacture of beer',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Manufacture of malt liquors',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Distilling and blending of spirits, production of ethyl alcohol',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Manufacture of mineral water',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Manufacture of soft drinks',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Manufacture of other non-alcoholic beverages',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Manufacture of tobacco products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
            'name' => 'Manufacture of textiles (other than by handloom)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:47:33',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
            'name' => 'Manufacture of textiles using handlooms (khadi)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
            'name' => 'Manufacture of carpet, rugs, blankets, shawls etc. (other than by hand)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Manufacture of carpet, rugs, blankets, shawls etc. by hand',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Manufacture of wearing apparel',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Tanning and dressing of leather',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Manufacture of luggage, handbags and the like saddler and harness',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Manufacture of footwear',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Manufacture of wood and wood products, cork, straw and plaiting material',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Manufacture of paper and paper products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Publishing, printing and reproduction of recorded media',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Manufacture of coke oven products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Manufacture of refined petroleum products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Processing of nuclear fuel',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Manufacture of fertilizers and nitrogen compounds',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Manufacture of plastics in primary forms and of synthetic rubber',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Manufacture of paints, varnishes and similar coatings',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Manufacture of pharmaceuticals, medicinal chemicals and botanical products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Manufacture of soap and detergents',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Manufacture of other chemical products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Manufacture of man-made fibers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Manufacture of rubber products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Manufacture of plastic products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Manufacture of glass and glass products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Manufacture of cement, lime and plaster',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Manufacture of articles of concrete, cement and plaster',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Manufacture of Bricks',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Manufacture of other clay and ceramic products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Manufacture of other non-metallic mineral products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Manufacture of pig iron, sponge iron, Direct Reduced Iron etc',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Manufacture of Ferro alloys',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Manufacture of Ingots, billets, blooms and slabs etc',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Manufacture of steel',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Manufacture of basic precious and non-ferrous metals',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Manufacture of non-metallic mineral products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Casting of metals',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Manufacture of fabricated metal products',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Manufacture of engines and turbines',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Manufacture of pumps and compressors',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Manufacture of bearings and gears',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Manufacture of ovens and furnaces',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Manufacture of lifting and handling equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Manufacture of other general purpose machinery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Manufacture of agricultural and forestry machinery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Manufacture of Machine Tools',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Manufacture of machinery for metallurgy',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Manufacture of machinery for mining, quarrying and constructions',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Manufacture of machinery for processing of food and beverages',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Manufacture of machinery for leather and textile',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Manufacture of weapons and ammunition',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Manufacture of other special purpose machinery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Manufacture of domestic appliances',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Manufacture of office, accounting and computing machinery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Manufacture of electrical machinery and apparatus',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Manufacture of Radio, Television, communication equipment and apparatus',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Manufacture of medical and surgical equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Manufacture of industrial process control equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Manufacture of instruments and appliances for measurements and navigation',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Manufacture of optical instruments',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Manufacture of watches and clocks',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Manufacture of motor vehicles',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Manufacture of body of motor vehicles',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Manufacture of parts & accessories of motor vehicles & engines',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Building & repair of ships and boats',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Manufacture of railway locomotive and rolling stocks',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Manufacture of aircraft and spacecraft',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Manufacture of bicycles',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Manufacture of other transport equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Manufacture of furniture',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Manufacture of jewellery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Manufacture of sports goods',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Manufacture of musical instruments',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Manufacture of games and toys',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Other manufacturing n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Recycling of metal waste and scrap',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Recycling of non- metal waste and scrap',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Production, collection and distribution of electricity',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Manufacture and distribution of gas',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Collection, purification and distribution of water',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Other essential commodity service n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Production, collection and distribution of electricity',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Manufacture and distribution of gas',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Collection, purification and distribution of water',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Other essential commodity service n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Site preparation works',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Building of complete constructions or parts- civil contractors',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Building installation',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Building completion',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Construction and maintenance of roads, rails, bridges, tunnels, ports, harbor, runways etc',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Construction and maintenance of power plants',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Construction and maintenance of industrial plants',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Construction and maintenance of power transmission and telecommunication lines',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Construction of water ways and water reservoirs',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Other construction activity n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
            'name' => 'Purchase, sale and letting of leased buildings-(residential and non-residential)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
            'name' => 'Operating of real estate of self-owned buildings (residential and non-residential)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Developing and sub-dividing real estate into lots',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Real estate activities on a fee or contract basis',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Other real estate/renting services n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Renting of land transport equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Renting of water transport equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Renting of air transport equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Renting of agricultural machinery and equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Renting of construction and civil engineering machinery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Renting of office machinery and equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Renting of other machinery and equipment n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Renting of personal and household goods n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Renting of other machinery n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Wholesale and retail sale of motor vehicles',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Repair and maintenance of motor vehicles',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Sale of motor parts and accessories- wholesale and retail',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Retail sale of automotive fuel',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'General commission agents, commodity brokers and auctioneers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Wholesale of agricultural raw material',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Wholesale of food & beverages and tobacco',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Wholesale of household goods',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Wholesale of metals and metal ores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Wholesale of household goods',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Wholesale of construction material',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Wholesale of hardware and sanitary fittings',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Wholesale of cotton and jute',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Wholesale of raw wool and raw silk',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Wholesale of other textile fibers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Wholesale of industrial chemicals',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Wholesale of fertilizers and pesticides',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Wholesale of electronic parts & equipment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Wholesale of other machinery, equipment and supplies',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Wholesale of waste, scrap & materials for re-cycling',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Retail sale of food, beverages and tobacco in specialized stores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Retail sale of other goods in specialized stores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Retail sale in non-specialized stores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Retail sale of textiles, apparel, footwear, leather goods',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Retail sale of other household appliances',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Retail sale of hardware, paint and glass',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Wholesale of other products n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Retail sale of other products n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'Hotels – Star rated',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Hotels – Non-star rated',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Motels, Inns and Dharmshalas',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Guest houses and circuit houses',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Dormitories and hostels at educational institutions',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Short stay accommodations n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Restaurants – with bars',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Restaurants – without bars',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Canteens',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Independent caterers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Casinos and other games of chance',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Other hospitality services n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Travel agencies and tour operators',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Packers and movers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Passenger land transport',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Air transport',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Transport by urban/sub-urban railways',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Inland water transport',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Sea and coastal water transport',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Freight transport by road',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Freight transport by railways',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Forwarding of freight',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Receiving and acceptance of freight',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Cargo handling',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Storage and warehousing',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
            'name' => 'Transport via pipelines (transport of gases, liquids, slurry and other commodities)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'Other Transport & Logistics services n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'Post and courier activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Basic telecom services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Value added telecom services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Maintenance of telecom network',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Activities of the cable operators',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Other Post & Telecommunication services n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Commercial banks, saving banks and discount houses',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Specialised institutions granting credit',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Financial leasing',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Hire-purchase financing',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Housing finance activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Commercial loan activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'Credit cards',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Mutual funds',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Chit fund',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Investment activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Life insurance',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Pension funding',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'Non-life insurance',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Administration of financial markets',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'Stock brokers, sub-brokers and related activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'Financial advisers, mortgage advisers and brokers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'Foreign exchange services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'Other financial intermediation services n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'name' => 'Software development',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'Other software consultancy',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'Data processing',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'name' => 'Database activities and distribution of electronic content',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'Other IT enabled services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'BPO services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'Cyber café',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'Maintenance and repair of office, accounting and computing machinery',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'Computer training and educational institutes',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'Other computation related services n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'Natural sciences and engineering',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'Social sciences and humanities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'Other Research & Development activities n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'name' => 'Legal profession',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'Accounting, book-keeping and auditing profession',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'Tax consultancy',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'Architectural profession',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'Engineering and technical consultancy',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'Advertising',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'Fashion designing',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'Interior decoration',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'Photography',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'Auctioneers',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'name' => 'Business brokerage',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'name' => 'Market research and public opinion polling',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'name' => 'Business and management consultancy activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'name' => 'Labour recruitment and provision of personnel',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'name' => 'Investigation and security services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'name' => 'Building-cleaning and industrial cleaning activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'Packaging activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'name' => 'Secretarial activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'name' => 'Medical Profession',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'Film Artist',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'name' => 'Other professional services n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'Primary education',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'name' => 'Secondary/ senior secondary education',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'name' => 'Technical and vocational secondary/ senior secondary education',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'Higher education',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'name' => 'Education by correspondence',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'name' => 'Coaching centres and tuitions',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'name' => 'Other education services n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'name' => 'General hospitals',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'Speciality and super Speciality hospitals',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'Nursing homes',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'Diagnostic centres',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'name' => 'Pathological laboratories',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'name' => 'Independent blood banks',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'name' => 'Medical transcription',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'name' => 'Independent ambulance services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'name' => 'Medical suppliers, agencies and stores',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'name' => 'Medical clinics',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'name' => 'Dental practice',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'Ayurveda practice',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'Unani practice',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'Homeopathy practice',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'Nurses, physiotherapists or other para-medical practitioners',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'name' => 'Veterinary hospitals and practice',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'name' => 'Medical education',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'Medical research',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'Practice of other alternative medicine',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'Other healthcare services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
            'name' => 'Social work activities with accommodation (orphanages and old age homes)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
            'name' => 'Social work activities without accommodation (Creches)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'Industry associations, chambers of commerce',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'Professional organisations',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'Trade unions',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'name' => 'Religious organizations',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'name' => 'Political organisations',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
            'name' => 'Other membership organisations n.e.c. (rotary clubs, book clubs and philatelic clubs)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'name' => 'Other Social or community service n.e.c',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'name' => 'Motion picture production',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'name' => 'Film distribution',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'name' => 'Film laboratories',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'name' => 'Television channel productions',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'name' => 'Television channels broadcast',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'Video production and distribution',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'Sound recording studios',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'Radio – recording and distribution',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'name' => 'Stage production and related activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'name' => 'Individual artists excluding authors',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'name' => 'Literary activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'name' => 'Other cultural activities n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'name' => 'Circuses and race tracks',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'name' => 'Video Parlours',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'name' => 'News agency activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'name' => 'Library and archives activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'name' => 'Museum activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'name' => 'Preservation of historical sites and buildings',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'name' => 'Botanical and zoological gardens',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'name' => 'Operation and maintenance of sports facilities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'name' => 'Activities of sports and game schools',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'name' => 'Organisation and operation of indoor/outdoor sports and promotion and production of sporting events',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'name' => 'Sports Management',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'name' => 'Other sporting activities n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'name' => 'Other recreational activities n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'name' => 'Hair dressing and other beauty treatment',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'name' => 'Funeral and related activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'name' => 'Marriage bureaus',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'name' => 'Pet care services',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'name' => 'Sauna and steam baths, massage salons etc.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'name' => 'Astrological and spiritualists’ activities',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'name' => 'Private households as employers of domestic staff',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'name' => 'Event Management',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'name' => 'Other services n.e.c.',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
            'name' => 'Extra territorial organisations and bodies (IMF, World Bank,European Commission etc.)',
                'created_at' => '2023-02-14 14:45:49',
                'updated_at' => '2023-02-14 14:45:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}