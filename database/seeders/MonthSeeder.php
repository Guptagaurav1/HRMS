<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Month;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $months = ['Jan' => 'January',
        'Feb' => 'February',
        'Mar' => 'March', 
        'Apr' => 'April',
        'May' => 'May',
        'Jun' => 'June',
        'Jul' => 'July',
        'Aug' => 'August',
        'Sep' => 'September',
        'Oct' => 'October',
        'Nov' => 'November',
        'Dec' => 'December'];

            foreach ($months as $key => $value) {
                Month::updateOrCreate(
                    ['month' => $key],
                    ['month' => $key, 'fullname' => $value]
                );
            }
    }
}
