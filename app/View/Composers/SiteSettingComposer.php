<?php
namespace App\View\Composers;

use App\Models\SiteSetting;
use Illuminate\View\View;

class SiteSettingComposer
{
    private $siteSetting;
    public function compose(View $view)
    {
        if (!$this->siteSetting) {
            $this->siteSetting = SiteSetting::first();
        }

        return $view->with('siteSetting', $this->siteSetting);
    }
}
