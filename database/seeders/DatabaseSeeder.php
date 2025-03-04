<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $idealmatches=[
            
            "English",
            "Amharic",
            "Afaan Oromo",
            "Mathematics",
            "Physics",
            "Chemistry",
            "Biology",
            "Geography",
            "History",
            "Civics",
            "Economics",
            "Business Studies",
            "Art",
            "Music",
            "Science",
            "Social Studies",
            "Civic and Ethical Education",
            "Physical Education",
            "IT and Digital Literacy",
            "Drawing",
           
        ];
        foreach ($idealmatches as $key => $value) {
          
            \App\Models\Subject::create([
                'name' => $value,
         
              
            ]);
        }
//         $idealmatches=[
//             'Akaki Kaliti-Sub City',
// 'Nefas Silk-Lafto-Sub City',
// 'Kolfe Keraniyo-Sub City',
// 'Gulele-Sub City',
// 'Lideta-Sub City',
// 'Kirkos-Sub City',
// 'Arada-Sub City',
// 'Addis Ketema-Sub City',
// 'Yeka-Sub City',
// 'Bole-Sub City'
           
//         ];
//         foreach ($idealmatches as $key => $value) {
          
//             \App\Models\Zone::create([
//                 'name' => $value,
//                 'region_id' =>'1'
              
//             ]);
//         }
        // $idealmatches=[
        //     'Addis Ababa',
           
        //     'Afar',
        //     'Amhara',
        //     'Benishangul-Gumuz',
        //     'Dire Dawa',
        //     'Gambela',
        //     'Harari',
        //     'Oromia',
        //     'Somali',
        //     'SNNPR',
        //     'Tigray',
        // ];
        // foreach ($idealmatches as $key => $value) {
          
        //     \App\Models\Region::create([
        //         'name' => $value
              
        //     ]);
        // }
            
        // $path = resource_path('/dev_tools/currency.sql');
        // DB::unprepared(file_get_contents($path));

        // $path2 = resource_path('/dev_tools/openai_table.sql');
        // DB::unprepared(file_get_contents($path2));

        // $path3 = resource_path('/dev_tools/openai_chat_categories_table.sql');
        // DB::unprepared(file_get_contents($path3));

        // $path4 = resource_path('/dev_tools/openai_filters.sql');
        // DB::unprepared(file_get_contents($path4));

        // $path5 = resource_path('/dev_tools/frontend_tools.sql');
        // DB::unprepared(file_get_contents($path5));

        // $path6 = resource_path('/dev_tools/faq.sql');
        // DB::unprepared(file_get_contents($path6));

        // $path7 = resource_path('/dev_tools/frontend_future.sql');
        // DB::unprepared(file_get_contents($path7));

        // $path8 = resource_path('/dev_tools/howitworks.sql');
        // DB::unprepared(file_get_contents($path8));

        // $path9 = resource_path('/dev_tools/testimonials.sql');
        // DB::unprepared(file_get_contents($path9));

        // $path10 = resource_path('/dev_tools/frontend_who_is_for.sql');
        // DB::unprepared(file_get_contents($path10));

        // $path11 = resource_path('/dev_tools/frontend_generators.sql');
        // DB::unprepared(file_get_contents($path11));

        // $path12 = resource_path('/dev_tools/clients.sql');
        // DB::unprepared(file_get_contents($path12));

        // $path13 = resource_path('/dev_tools/health_check_result_history_items.sql');
        // DB::unprepared(file_get_contents($path13));
       
        // $path14 = resource_path('/dev_tools/email_templates.sql');
        // DB::unprepared(file_get_contents($path14));

        // $path15 = resource_path('/dev_tools/ads.sql');
        // DB::unprepared(file_get_contents($path15));

        // $path16 = resource_path('/dev_tools/ai_wizard.sql');
        // DB::unprepared(file_get_contents($path16));

        // $this->command->info('Currency table seeded!');
    }
}
