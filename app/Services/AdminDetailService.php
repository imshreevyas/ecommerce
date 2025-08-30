<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\CompanyProfile;
use App\Models\GeneralSetting;
use App\Models\AdminLoginHistory;

class AdminDetailService
{
    public function getDetailsByAdminUid($id)
    {
        return [
            'admin_details'     => Admin::where('id', $id)->first(),
            'company_profile'   => CompanyProfile::where('id', $id)->first(),
            'general_settings'  => GeneralSetting::where('id', $id)->first(),
            'login_history'     => AdminLoginHistory::where('id', $id)->first(),
        ];
    }

    public function getDetailsForAuthenticatedAdmin()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return null;
        }

        return $this->getDetailsByAdminUid($admin->id);
    }
}
