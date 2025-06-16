<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan; // This is used to call artisan commands from within the controller

class DatabaseController extends Controller
{
    public function addDatabase()
    {
        try {
            // Running migrations
            Artisan::call('migrate:refresh');

            // Clear the cache (optional)
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('view:clear');

            // Optionally, you can run any other commands like seeding
            // Artisan::call('db:seed');

            return response()->json(['message' => 'Database refreshed successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while refreshing the database: ' . $e->getMessage()], 500);
        }
    }
}
