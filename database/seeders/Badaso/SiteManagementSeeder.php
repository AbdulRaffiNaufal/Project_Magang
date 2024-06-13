<?php

namespace Database\Seeders\Badaso;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Models\Configuration;

class SiteManagementSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @throws Exception
     *
     * @return void
     */
    public function run()
    {
        \DB::beginTransaction();

        try {
            $settings = [
                0 => [
                    'id' => 1,
                    'key' => 'adminPanelTitle',
                    'display_name' => 'Admin Panel Title',
                    'value' => 'Badaso',
                    'details' => '',
                    'type' => 'text',
                    'order' => 1,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                1 => [
                    'id' => 2,
                    'key' => 'adminPanelDescription',
                    'display_name' => 'Admin Panel Description',
                    'value' => 'Badaso, SPA CRUD Generator',
                    'details' => '',
                    'type' => 'text',
                    'order' => 2,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                2 => [
                    'id' => 3,
                    'key' => 'adminPanelLogo',
                    'display_name' => 'Admin Panel Logo',
                    'value' => 'files/shares/logo.webp',
                    'details' => '{"type":"shares-only"}',
                    'type' => 'upload_image',
                    'order' => 3,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                3 => [
                    'id' => 4,
                    'key' => 'adminPanelHeaderColor',
                    'display_name' => 'Admin Panel Header Color',
                    'value' => '#ffffff',
                    'details' => '',
                    'type' => 'color_picker',
                    'order' => 4,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                4 => [
                    'id' => 5,
                    'key' => 'landingPageTitle',
                    'display_name' => 'Landing Page Title',
                    'value' => 'Badaso',
                    'details' => '',
                    'type' => 'text',
                    'order' => 1,
                    'group' => 'landingPage',
                    'can_delete' => 0,
                ],
                5 => [
                    'id' => 6,
                    'key' => 'adminPanelHeaderFontColor',
                    'display_name' => 'Admin Panel Header Font Color',
                    'value' => '#06bbd3',
                    'details' => '',
                    'type' => 'color_picker',
                    'order' => 5,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                6 => [
                    'id' => 7,
                    'key' => 'adminPanelVerifyEmail',
                    'display_name' => 'Should verify email after register',
                    'value' => '1',
                    'details' => '',
                    'type' => 'switch',
                    'order' => 6,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                7 => [
                    'id' => 8,
                    'key' => 'adminPanelLogoConfig',
                    'display_name' => 'Admin Panel Logo Config',
                    'value' => 'logo_only',
                    'details' => '{"items":[{"label":"Logo Only","value":"logo_only"},{"label":"Text Only","value":"text_only"},{"label":"Logo & Text","value":"logo_and_text"}]}',
                    'type' => 'select',
                    'order' => 1,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                8 => [
                    'id' => 9,
                    'key' => 'favicon',
                    'display_name' => 'Favicon',
                    'value' => 'files/shares/favicon.png',
                    'details' => '{"type":"shares-only"}',
                    'type' => 'upload_image',
                    'order' => 7,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                9 => [
                    'id' => 10,
                    'key' => 'maintenance',
                    'display_name' => 'Maintenance for all pages.',
                    'value' => '0',
                    'details' => 'Admin still can access the dashboard.',
                    'type' => 'switch',
                    'order' => 8,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
                10 => [
                    'id' => 11,
                    'key' => 'authBackgroundImage',
                    'display_name' => 'Background image for login page.',
                    'value' => 'files/shares/auth-bg.jpg',
                    'details' => 'Admin still can access the dashboard.',
                    'type' => 'upload_image',
                    'order' => 9,
                    'group' => 'adminPanel',
                    'can_delete' => 0,
                ],
            ];

            foreach ($settings as $key => $value) {
                Configuration::where('key', $value['key'])->delete();
                Configuration::create($value);
            }

            \DB::commit();
        } catch (Exception $e) {
            throw new Exception('Exception occur '.$e);
            \DB::rollBack();
        }
    }
}
