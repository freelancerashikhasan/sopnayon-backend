<?php

namespace Database\Seeders;

use App\Models\SiteKeyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteKeyword::insert(
            [
                [
                    'keyword' => 'home',
                    'bn' => 'হোম',
                    'en' => 'Home',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'about us',
                    'bn' => 'আমাদের সম্পর্কে',
                    'en' => 'About Us',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'comitee',
                    'bn' => 'কমিটি',
                    'en' => 'Comitee',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'terms and condition',
                    'bn' => 'নীতিমালা',
                    'en' => 'Terms And Condition',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'blog',
                    'bn' => 'ব্লগ',
                    'en' => 'Blog',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'gallary',
                    'bn' => 'গ্যালারি',
                    'en' => 'Gallary',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'team member',
                    'bn' => 'কার্যকরী সদস্য',
                    'en' => 'Team Member',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'all member',
                    'bn' => 'সকল সদস্য',
                    'en' => 'All Member',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'donor member',
                    'bn' => 'দাতা সদস্য',
                    'en' => 'Donor Member',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'project',
                    'bn' => 'প্রজেক্ট',
                    'en' => 'Project',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'chairmen sms',
                    'bn' => 'সভাপতির বার্তা',
                    'en' => 'Chairmen SMS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'secretary sms',
                    'bn' => 'সাধারণ সম্পাদকের বার্তা',
                    'en' => 'Secretary SMS',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'notice board',
                    'bn' => 'নোটিশ বোর্ড',
                    'en' => 'Notice board',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'a notice board from higher othority',
                    'bn' => 'উচ্চতর কর্তৃপক্ষের একটি নোটিশ বোর্ড',
                    'en' => 'A Notice Board from Higher Othority',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'our google map location',
                    'bn' => 'আমাদের ঠিকানা',
                    'en' => 'Our Google Map Location',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'all blog post',
                    'bn' => 'সকল ব্লগ পোস্ট',
                    'en' => 'All Blog Post',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'our gallary',
                    'bn' => 'আমাদের গ্যালারি',
                    'en' => 'Our Gallary',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'donating everything',
                    'bn' => 'সবকিছু দান করা',
                    'en' => 'Donating Everything',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'millions of pepole will be happy if you make them happy',
                    'bn' => 'তুমি যদি লক্ষ লক্ষ মানুষকে খুশি করো, তাহলে তারা খুশি হবে।',
                    'en' => 'Millions of Pepole will be Happy if You make them Happy',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'organization',
                    'bn' => 'প্রতিষ্ঠান',
                    'en' => 'organization',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'profile',
                    'bn' => 'প্রফাইল',
                    'en' => 'Profile',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'useful links',
                    'bn' => 'প্রয়োজনীয় লিঙ্কসমূহ',
                    'en' => 'Useful Links',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'services',
                    'bn' => 'সার্ভিস সমূহ',
                    'en' => 'Services',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'support',
                    'bn' => 'সাপোর্ট',
                    'en' => 'Support',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'comunity',
                    'bn' => 'কমিউনিটি',
                    'en' => 'Comunity',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'download apk',
                    'bn' => 'অ্যাপ ডাউনলোড',
                    'en' => 'Download Apk',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'They Will Give many Notice Bord About The Organization, & Everyone should be maintain this rules and regulations.',
                    'bn' => 'সংগঠন সম্পর্কে অনেক নোটিশ বোর্ড এ দেওয়া হবে, এবং প্রত্যেকেরই এই নিয়মকানুন মেনে চলা উচিত।',
                    'en' => 'They Will Give many Notice Bord About The Organization, & Everyone should be maintain this rules and regulations.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => 'They Will Give many Notice Bord About The Organization, & Everyone should be maintain this rules and regulations.',
                    'bn' => 'সংগঠন সম্পর্কে অনেক নোটিশ বোর্ড এ দেওয়া হবে, এবং প্রত্যেকেরই এই নিয়মকানুন মেনে চলা উচিত।',
                    'en' => 'They Will Give many Notice Bord About The Organization, & Everyone should be maintain this rules and regulations.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'keyword' => '
Welcome to PSVO BD! This notice board provides essential updates, events, and guidelines for all members, staff, and volunteers. Stay informed and adhere to the rules to ensure a safe, inclusive, and productive environment for all.',
                    'bn' => 'PSVO BD তে আপনাকে স্বাগতম! এই নোটিশ বোর্ডটি সকল সদস্য, কর্মী এবং স্বেচ্ছাসেবকদের জন্য প্রয়োজনীয় আপডেট, ইভেন্ট এবং নির্দেশিকা প্রদান করে। সকলের জন্য একটি নিরাপদ, অন্তর্ভুক্তিমূলক এবং উৎপাদনশীল পরিবেশ নিশ্চিত করতে অবগত থাকুন এবং নিয়ম মেনে চলুন।',
                    'en' => '
Welcome to PSVO BD! This notice board provides essential updates, events, and guidelines for all members, staff, and volunteers. Stay informed and adhere to the rules to ensure a safe, inclusive, and productive environment for all.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],


            ]
        );
    }
}
