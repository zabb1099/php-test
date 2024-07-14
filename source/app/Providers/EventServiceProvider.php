<?php

namespace App\Providers;

use App\Events\ITPortal\DevSupportJobs\BulkCreditor\DMDebtsolvCreateBulkCreditorEvent;
use App\Events\ITPortal\DevSupportJobs\BulkCreditor\DMDebtsolvUpdateBulkCreditorEvent;
use App\Events\ITPortal\DevSupportJobs\BulkDebt\UpdateBulkDebtEvent;
use App\Events\ITPortal\DevSupportJobs\CardPayment\DMDebtsolvCardPaymentEvent;
use App\Events\ITPortal\DevSupportJobs\BreachPortal\UpdateBreachStatusEvent;
use App\Events\ITPortal\DevSupportJobs\BulkCreditor\IVADebtsolvCreateBulkCreditorEvent;
use App\Events\ITPortal\DevSupportJobs\BulkCreditor\IVADebtsolvUpdateBulkCreditorEvent;
use App\Events\ITPortal\DevSupportJobs\CardPayment\IVADebtsolvCardPaymentEvent;
use App\Events\ITPortal\DevSupportJobs\ClientStatus\DMDebtsolvUpdateClientStatusEvent;
use App\Events\ITPortal\DevSupportJobs\ClientStatus\IVADebtsolvUpdateClientStatusEvent;
use App\Events\ITPortal\DevSupportJobs\ClientType\DMDebtsolvUpdateClientTypeEvent;
use App\Events\ITPortal\DevSupportJobs\ClientType\IVADebtsolvUpdateClientTypeEvent;
use App\Events\ITPortal\DevSupportJobs\DuplicateFile\DeleteDuplicateDMDebtsolvFilesEvent;
use App\Events\ITPortal\DevSupportJobs\DuplicateFile\DeleteDuplicateIVADebtsolvFilesEvent;
use App\Events\ITPortal\DevSupportJobs\DuplicateFile\UpdateDebtsolvDMClientIdEvent;
use App\Events\ITPortal\DevSupportJobs\DuplicateFile\UpdateDebtsolvIVAClientIdEvent;
use App\Events\ITPortal\DevSupportJobs\FSSUser\DeleteBFGPortalLoginEvent;
use App\Events\ITPortal\DevSupportJobs\FSSUser\UpdateBFGPortalLoginEvent;
use App\Events\ITPortal\DevSupportJobs\IsRX1Required\IsRX1RequiredEvent;
use App\Events\ITPortal\DevSupportJobs\IVABond\BondRenewalDateEvent;
use App\Events\ITPortal\DevSupportJobs\IVABond\RemoveDuplicateBondEvent;
use App\Events\ITPortal\DevSupportJobs\IVABond\RemoveBondRenewalEvent;
use App\Events\ITPortal\DevSupportJobs\IVAMeeting\RemoveSecondMeetingEvent;
use App\Events\ITPortal\DevSupportJobs\IVAMeeting\UpdateMeetingOutcomeEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\CreatePhoenixV1LoginEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\DeleteAssignedLeadDispositionsEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\DeletePhoenixV1LoginEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\UpdateAssignedLeadDispositionsEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\UpdateHistoryAssignedLeadDispositionsEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\UpdateHistoryLeadDispositionsEvent;
use App\Events\ITPortal\DevsupportJobs\LeadsUser\UpdatePrepareAMSRetransferEvent;
use App\Events\ITPortal\DevSupportJobs\LeadsUser\UpdateVerifiedLeadDispositionsEvent;
use App\Events\ITPortal\DevSupportJobs\NewBACSCreditor\DMNewBACSCreditorEvent;
use App\Events\ITPortal\DevSupportJobs\NewBACSCreditor\IVANewBACSCreditorEvent;
use App\Events\ITPortal\DevSupportJobs\ProcessPayout\DMDebtsolvProcessPayoutEvent;
use App\Events\ITPortal\DevSupportJobs\ProcessPayout\IVADebtsolvProcessPayoutEvent;
use App\Events\ITPortal\DevSupportJobs\RemoveErroredPayouts\DMUpdateErroredPayoutEvent;
use App\Events\ITPortal\DevSupportJobs\TestCaseFile\LeadsClientFileEvent;
use App\Events\ITPortal\DevSupportJobs\UnlockClientFile\DMDebtsolvUnlockClientFileEvent;
use App\Events\ITPortal\DevSupportJobs\UnlockClientFile\FSSUnlockClientFileEvent;
use App\Events\ITPortal\DevSupportJobs\UnlockClientFile\IVADebtsolvUnlockClientFileEvent;
use App\Events\ITPortal\DevSupportJobs\XMLGeneration\XMLGenerationEvent;
use App\Listeners\AuditingDevSupportJobsListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        /** Update IVA Bond **/
        BondRenewalDateEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        RemoveDuplicateBondEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        RemoveBondRenewalEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update IVA Meeting **/
        RemoveSecondMeetingEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        UpdateMeetingOutcomeEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Create/Delete Phoenix V1 user account **/
        CreatePhoenixV1LoginEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        DeletePhoenixV1LoginEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** New BACS Creditors **/
        DMNewBACSCreditorEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVANewBACSCreditorEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Process Payouts **/
        DMDebtsolvProcessPayoutEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvProcessPayoutEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update Client File to a Test Case **/
        LeadsClientFileEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Unlock Client File **/
        DMDebtsolvUnlockClientFileEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvUnlockClientFileEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        FSSUnlockClientFileEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** XML Generation **/
        XMLGenerationEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Generate RX1 form or Sale of Property Letter **/
        IsRX1RequiredEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update and Delete Lead Dispositions **/
        UpdateHistoryLeadDispositionsEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        UpdateHistoryAssignedLeadDispositionsEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        UpdateAssignedLeadDispositionsEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        DeleteAssignedLeadDispositionsEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        UpdateVerifiedLeadDispositionsEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update Client Type **/
        DMDebtsolvUpdateClientTypeEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvUpdateClientTypeEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update Client Status **/
        DMDebtsolvUpdateClientStatusEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvUpdateClientStatusEvent::class => [
           AuditingDevSupportJobsListener::class
        ],
        /** Update/Delete BFG Portal user account **/
        UpdateBFGPortalLoginEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        DeleteBFGPortalLoginEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update / Create Bulk Creditor **/
        DMDebtsolvCreateBulkCreditorEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        DMDebtsolvUpdateBulkCreditorEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvCreateBulkCreditorEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvUpdateBulkCreditorEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Process Errored Card Payments **/
        DMDebtsolvCardPaymentEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        IVADebtsolvCardPaymentEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Delete Duplicate Debtsolv Files **/
        UpdateDebtsolvDMClientIdEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        DeleteDuplicateDMDebtsolvFilesEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        UpdateDebtsolvIVAClientIdEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        DeleteDuplicateIVADebtsolvFilesEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update Bulk Debts **/
        UpdateBulkDebtEvent::class => [
            AuditingDevSupportJobsListener::class
        ],
        /** Update Errored Payouts **/
        DMUpdateErroredPayoutEvent::class => [
            AuditingDevSupportJobsListener::class
            ],

        /** Prepare AMS file for ReTransfer */
        UpdatePrepareAMSRetransferEvent::class => [
            AuditingDevSupportJobsListener::class
        ],

        /** Update Breach Status */
        UpdateBreachStatusEvent::class => [
            AuditingDevSupportJobsListener::class
        ]
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
