<?php

namespace App\Providers;

use App\Policies\LoginGate;
use App\Policies\ITPortal\DevSupportJobsGate;
use App\Policies\ITPortal\PrintQueueGate;
use App\Policies\ITPortal\ITNoticeGate;
use App\Policies\ITPortal\KnowledgeBaseGate;
use App\Policies\ITPortal\OfficeUserGate;
use App\Policies\ITPortal\AssetRegisterGate;
use App\Policies\ITPortal\UserStationGate;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::tokensExpireIn(Carbon::now('Europe/London')->addHour());
        Passport::refreshTokensExpireIn(Carbon::now('Europe/London')->addMonths(12));

        Gate::define('authorisedUserLogin', [LoginGate::class, 'authorisedUser']);

        Gate::define('viewKnowledgeBase', [KnowledgeBaseGate::class, 'view']);
        Gate::define('createKnowledgeBase', [KnowledgeBaseGate::class, 'create']);
        Gate::define('editKnowledgeBase', [KnowledgeBaseGate::class, 'edit']);
        Gate::define('deleteKnowledgeBase', [KnowledgeBaseGate::class, 'delete']);

        Gate::define('viewOfficeUser', [OfficeUserGate::class, 'view']);
        Gate::define('createOfficeUser', [OfficeUserGate::class, 'create']);
        Gate::define('editOfficeUser', [OfficeUserGate::class, 'edit']);
        Gate::define('deleteOfficeUser', [OfficeUserGate::class, 'delete']);

        Gate::define('viewAssetRegister', [AssetRegisterGate::class, 'view']);
        Gate::define('createAssetRegister', [AssetRegisterGate::class, 'create']);
        Gate::define('editAssetRegister', [AssetRegisterGate::class, 'edit']);
        Gate::define('deleteAssetRegister', [AssetRegisterGate::class, 'delete']);

        Gate::define('viewUserStation', [UserStationGate::class, 'view']);
        Gate::define('createUserStation', [UserStationGate::class, 'create']);
        Gate::define('editUserStation', [UserStationGate::class, 'edit']);
        Gate::define('deleteUserStation', [UserStationGate::class, 'delete']);

        Gate::define('viewNotice', [ITNoticeGate::class, 'view']);
        Gate::define('createNotice', [ITNoticeGate::class, 'create']);
        Gate::define('editNotice', [ITNoticeGate::class, 'edit']);
        Gate::define('deleteNotice', [ITNoticeGate::class, 'delete']);


        /**
         *
         * Dev Support Jobs.
         *
         */

        /** Unlock Client File **/
        Gate::define('fssUnlockClientFileDevSupportJobs', [DevSupportJobsGate::class, 'fssUnlockClientFile']);
        Gate::define('dmDebtsolvUnlockClientFileDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvUnlockClientFile']);
        Gate::define('ivaDebtsolvUnlockClientFileDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvUnlockClientFile']);

        /** Update IVA Bond **/
        Gate::define('removeDuplicateBondDevSupportJobs', [DevSupportJobsGate::class, 'RemoveDuplicateBond']);
        Gate::define('updateBondRenewalDateDevSupportJobs', [DevSupportJobsGate::class, 'updateBondRenewalDate']);

        /** Process Payouts **/
        Gate::define('dmDebtsolvProcessPayoutDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvProcessPayout']);
        Gate::define('ivaDebtsolvProcessPayoutDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvProcessPayout']);

        /** New BACS Creditors **/
        Gate::define('dmDebtsolvNewBACSCreditorDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvNewBACSCreditor']);
        Gate::define('ivaDebtsolvNewBACSCreditorDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvNewBACSCreditor']);

        /** Update Client File to a Test Case **/
        Gate::define('leadsTestCaseClientDevSupportJobs', [DevSupportJobsGate::class, 'leadsTestCaseClient']);

        /** Update IVA Meeting **/
        Gate::define('removeSecondMeetingDevSupportJobs', [DevSupportJobsGate::class, 'removeSecondMeeting']);
        Gate::define('meetingOutcomeDevSupportJobs', [DevSupportJobsGate::class, 'meetingOutcome']);

        /** Update Users table on Leads DB to create a Phoenix V1 user account **/
        Gate::define('createPhoenixLoginDevSupportJobs', [DevSupportJobsGate::class, 'createPhoenixLogin']);

        /** Generate XMLs **/
        Gate::define('generateXMLDevSupportJobs', [DevSupportJobsGate::class, 'generateXML']);

        /** Generate RX1 form or Sale of Property Letter **/
        Gate::define('isRX1RequiredDevSupportJobs', [DevSupportJobsGate::class, 'isRX1Required']);

        /** Update and Delete Lead Dispositions **/
        Gate::define('updateHistoryLeadDispositionsDevSupportJobs', [DevSupportJobsGate::class, 'updateHistoryLeadDispositions']);
        Gate::define('deleteAssignedLeadDispositionsDevSupportJobs', [DevSupportJobsGate::class, 'deleteAssignedLeadDispositions']);

        /** Update Client Type **/
        Gate::define('dmDebtsolvUpdateClientTypeDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvUpdateClientType']);
        Gate::define('ivaDebtsolvUpdateClientTypeDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvUpdateClientType']);

        /** Update Client Status **/
        Gate::define('dmDebtsolvUpdateClientStatusDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvUpdateClientStatus']);
        Gate::define('ivaDebtsolvUpdateClientStatusDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvUpdateClientStatus']);

        /** Update FSS table on Leads DB to create a BFG Portal user account **/
        Gate::define('updateBFGPortalLoginDevSupportJobs', [DevSupportJobsGate::class, 'updateBFGPortalLogin']);

        /** Create / Update Bulk Creditor **/
        Gate::define('dmDebtsolvUpdateBulkCreditorDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvUpdateBulkCreditor']);
        Gate::define('ivaDebtsolvUpdateBulkCreditorDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvUpdateBulkCreditor']);

        /**  Process Errored Card Payments **/
        Gate::define('dmDebtsolvProcessCardPaymentDevSupportJobs', [DevSupportJobsGate::class, 'dmDebtsolvProcessCardPayment']);
        Gate::define('ivaDebtsolvProcessCardPaymentDevSupportJobs', [DevSupportJobsGate::class, 'ivaDebtsolvProcessCardPayment']);

        /**  Delete Duplicate Debtsolv Files **/
        Gate::define('dmDeleteDuplicateDebtsolvFilesDevSupportJobs', [DevSupportJobsGate::class, 'dmDeleteDuplicateDebtsolvFiles']);
        Gate::define('ivaDeleteDuplicateDebtsolvFilesDevSupportJobs', [DevSupportJobsGate::class, 'ivaDeleteDuplicateDebtsolvFiles']);

        /** Update Bulk Debts **/
        Gate::define('getStatusTypeTablesDevSupportJobs', [DevSupportJobsGate::class, 'getStatusTypeTables']);
        Gate::define('dmUpdateBulkDebtsDevSupportJobs', [DevSupportJobsGate::class, 'dmUpdateBulkDebts']);
        Gate::define('ivaUpdateBulkDebtsDevSupportJobs', [DevSupportJobsGate::class, 'ivaUpdateBulkDebts']);

        /** Remove Errored Payouts */
        Gate::define('dmDebtsolvRemoveErroredPayoutsDevSupportJobs', [DevSupportJobsGate::class, 'getErroredPayouts']);

        /** Ams Retransfer Update */
        Gate::define('amsRetransferFileDevSupportJobs',[DevSupportJobsGate::class, 'amsRetransferFile']);

        /** Get Breach Status */
        Gate::define('getBreachStatusDevSupportJobs', [DevSupportJobsGate::class, 'getBreachStatus']);

        /*
         *
         * Print Queues.
         *
         */


        Gate::define('accessPrintQueuesPrintQueue', [PrintQueueGate::class, 'accessPrintQueues']);
    }
}
