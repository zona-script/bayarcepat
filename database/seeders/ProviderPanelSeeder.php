<?php

namespace Database\Seeders;

use App\Models\ProviderPanel;
use App\Services\SMM\Factories\SMMFactory;
use Illuminate\Database\Seeder;

class ProviderPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providerPanel = ProviderPanel::create([
            'name' => 'LOLLIPOP SMM PANEL',
            'website' => 'https://lollipop-smm.com/',
            'get_profile_url' => 'https://lollipop-smm.com/api/profile',
            'get_services_url' => 'https://lollipop-smm.com/api/services',
            'check_status_url' => 'https://lollipop-smm.com/api/order',
            'create_order_url' => 'https://lollipop-smm.com/api/status',
            'is_active' => true
        ]);

        SMMFactory::make($providerPanel)->syncServices();
    }
}
