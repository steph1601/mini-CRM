<?php

namespace App\Observers;

use App\Models\Companies;
use Illuminate\Support\Str;

class CompanyObserver
{
     /**
     * Handle the Company "creating" event.
     *
     * @param  \App\Models\Companies  $company
     * @return void
     */
    public function creating(Companies $company)
    {
        // Logic before the company is created, e.g., modifying data
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');

            // Generate the filename based on the company name
            // Use a slug to make the filename URL-friendly
            $filename = Str::slug($company->company_name) . '.' . $file->getClientOriginalExtension();

            // Set the filename in the company model
            $company->logo = $filename;
        }

        
    }
    /**
     * Handle the Companies "created" event.
     *
     * @param  \App\Models\Companies  $companies
     * @return void
     */
    public function created(Companies $company)
    {
        if (request()->hasFile('logo')) {
            $file = request()->file('logo');

            // Store the file with the company name as the filename
            $file->storeAs('logo_img', $company->logo, 'public');
        }
    }

    /**
     * Handle the Companies "updated" event.
     *
     * @param  \App\Models\Companies  $companies
     * @return void
     */
    public function updated(Companies $companies)
    {
        //
    }

    /**
     * Handle the Companies "deleted" event.
     *
     * @param  \App\Models\Companies  $companies
     * @return void
     */
    public function deleted(Companies $companies)
    {
        //
    }

    /**
     * Handle the Companies "restored" event.
     *
     * @param  \App\Models\Companies  $companies
     * @return void
     */
    public function restored(Companies $companies)
    {
        //
    }

    /**
     * Handle the Companies "force deleted" event.
     *
     * @param  \App\Models\Companies  $companies
     * @return void
     */
    public function forceDeleted(Companies $companies)
    {
        //
    }
}
