<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->full_name = "Tlangelani Nghonani";
        $user->contact = "+27 67 722 8944";
        $user->password = Hash::make("tlangelani");
        $user->picture_path = "";
        $user->save();

        $user = new User();
        $user->full_name = "Cathrine Smith";
        $user->contact = "cathy@myth.com";
        $user->password = Hash::make("cathrine");
        $user->picture_path = "https://headtopics.com/images/2020/10/20/nordicstylemag/natural-and-intuitive-beauty-are-important-concepts-in-our-modern-world-finnish-face-yoga-instructor-1318514480276475904.webp";
        $user->save();
        
        $user = new User();
        $user->full_name = "Leon Schroeder";
        $user->contact = "+27 85 564 4897";
        $user->password = Hash::make("leon");
        $user->picture_path = "https://static.dazzling.news/img/articles/3882/800x800/5aa7dd877388d_man0.jpg";
        $user->save();

        $user = new User();
        $user->full_name = "Ali Travis";
        $user->contact = "alitravis@gmail.com";
        $user->password = Hash::make("ali");
        $user->picture_path = "";
        $user->save();

        $user = new User();
        $user->full_name = "Barbara Booker";
        $user->contact = "+27 72 908 6205";
        $user->password = Hash::make("barbara");
        $user->picture_path = "https://static.independent.co.uk/2021/10/08/15/Hale_BarbaraHershey_191.jpg?width=1200";
        $user->save();
        
        $user = new User();
        $user->full_name = "Bailey Cline";
        $user->contact = "+27 67 722 8944";
        $user->password = Hash::make("bailey");
        $user->picture_path = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSndT-mKT9lEsgSLqiN7YP1YVIx1CJnnd9FVicY7_QmSI2qJHCgOdbqXjUetcKEp3kgJcE&usqp=CAU";
        $user->save();
        
        $user = new User();
        $user->full_name = "David Solis";
        $user->contact = "+27 67 722 8944";
        $user->password = Hash::make("david");
        $user->picture_path = "https://www.swp-berlin.org/assets/_processed_/3/1/csm_Kipp_David_presse_01_7bb3828e9e.jpg";
        $user->save();
        
        $user = new User();
        $user->full_name = "Alisson Franklin";
        $user->contact = "+27 83 349 3810";
        $user->password = Hash::make("alisson");
        $user->picture_path = "";
        $user->save();

        $user = new User();
        $user->full_name = "Janiyah Weeks";
        $user->contact = "weeks@apple.com";
        $user->password = Hash::make("janiyah");
        $user->picture_path = "";
        $user->save();

        $user = new User();
        $user->full_name = "Lila Mccall";
        $user->contact = "+27 67 598 4578";
        $user->password = Hash::make("lila");
        $user->picture_path = "";
        $user->save();

    }
}
