<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $line1 Line 1 of address.
 * @property string|null $line2 Line 2 of address. Optional
 * @property string $state State
 * @property string $zip Zip Code
 * @property string $plus_four Plus four code. US specific thing
 * @property int|null $city_id Address city
 * @property int|null $country_id Address country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Khsing\World\Models\City|null $city
 * @property-read \Khsing\World\Models\Country|null $country
 * @property-read \App\Models\Facilities\Facility $facility
 * @property-read \App\Models\Patients\Patient $patient
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AddressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePlusFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZip($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Amendment
 *
 * @property int $id
 * @property int $patient_id Patient who amendment could be for.
 * @property int $created_by User who created amendment.
 * @property int $modified_by User who modified amendment.
 * @property string $amendment_date Amendment Date.
 * @property string $from Amendment requested from.
 * @property int $status Status. 0->rejected, 1->accepted, 2->null
 * @property string|null $description Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereAmendmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereModifiedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amendment whereUpdatedAt($value)
 */
	class Amendment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AmendmentHistory
 *
 * @property int $id
 * @property int $amendment_id Foreign key to amendments table.
 * @property int $created_by User who created amendment.
 * @property int $status Amendment Status.
 * @property string|null $notes Amendment Notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereAmendmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmendmentHistory whereUpdatedAt($value)
 */
	class AmendmentHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AuditDetail
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuditDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditDetail whereUpdatedAt($value)
 */
	class AuditDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AuditMaster
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuditMaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditMaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditMaster query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditMaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditMaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditMaster whereUpdatedAt($value)
 */
	class AuditMaster extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AutomaticNotification
 *
 * @property int $id
 * @property string $sms_gateway_type Type of sms gateway.
 * @property string $next_app_schedule When next notification is scheduled?
 * @property string $provider_name
 * @property string|null $message Message to be sent.
 * @property string $email_sender Who sent email? It can be any user or any clinic.
 * @property string $email_subject Subject of notification
 * @property string $type Type of notification.
 * @property string $notification_sent_date When notification was sent.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereEmailSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereEmailSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereNextAppSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereNotificationSentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereSmsGatewayType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomaticNotification whereUpdatedAt($value)
 */
	class AutomaticNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BackgroundService
 *
 * @property int $id
 * @property string $name Service Name
 * @property string $title Name for reports
 * @property int $active Is service active or deleted.  0 -> False | 1 -> True
 * @property int $running Is service running or stopped. 0 -> Stopped(False) | 1 -> Running(True)
 * @property string $next_run When next run is scheduled?
 * @property int $execute_interval Minimum number of minutes between function calls, 0 = Manual Mode
 * @property string $function Name of background service function
 * @property int $sort_order If there are multiple services, then lower number will run first.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService query()
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereExecuteInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereNextRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereRunning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BackgroundService whereUpdatedAt($value)
 */
	class BackgroundService extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BatchCommunication
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $sender_id Foreign key to users table.
 * @property string $msg_type Message Type
 * @property string|null $msg_subject Subject
 * @property string|null $msg_text Message to be sent.
 * @property string $msg_date_sent Timestamp when message was sent.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication query()
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereMsgDateSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereMsgSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereMsgText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereMsgType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BatchCommunication whereUpdatedAt($value)
 */
	class BatchCommunication extends \Eloquent {}
}

namespace App\Models\Calendars{
/**
 * App\Models\Calendars\CalendarCategory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarCategory whereUpdatedAt($value)
 */
	class CalendarCategory extends \Eloquent {}
}

namespace App\Models\Calendars{
/**
 * App\Models\Calendars\CalendarEvent
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalendarEvent whereUpdatedAt($value)
 */
	class CalendarEvent extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoriesToDocument
 *
 * @property int $id
 * @property int $category_id Foreign Key to categories table.
 * @property int $document_id Foreign key to Documents table.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriesToDocument whereUpdatedAt($value)
 */
	class CategoriesToDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name Category name.
 * @property int $parent "Parent of sub directory. Category directory is root and hence it will have parent as 0.
 * @property int $left Left Subtree.
 * @property int $right Right Subtree
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChartTracker
 *
 * @property int $id
 * @property int $user_id Foreign Key to users table.
 * @property string $when Timestamp when this created.
 * @property string $location Location.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChartTracker whereWhen($value)
 */
	class ChartTracker extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $symbol
 * @property string $format
 * @property string $exchange_rate
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DatedReminder
 *
 * @property int $id
 * @property int $from_id Who created dated reminder? Refers to users table.
 * @property int $patient_id Foreign key to patients table.
 * @property string $dr_message_text Message.
 * @property string $dr_message_sent_date When message is sent.
 * @property string $dr_message_due_date Due Date
 * @property int $message_priority Priority of Message. 1 -> High | 2 -> Medium | 3 -> Low
 * @property int $message_processed Is message processed? 0 -> No | 1 -> Yes
 * @property string $processed_date When message is processed by respective user? Not keeping it null,
 *                  because it can be system generated datetime, whenever message is processed.
 * @property int|null $processed_by User who processed the message. It can be multiple users or a single
 *                  user. References users table.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder query()
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereDrMessageDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereDrMessageSentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereDrMessageText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereMessagePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereMessageProcessed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereProcessedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminder whereUpdatedAt($value)
 */
	class DatedReminder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DatedReminderLink
 *
 * @property int $id
 * @property int $dated_reminder_id Link to dated_reminders table.
 * @property int $to_id Link to users table
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink whereDatedReminderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatedReminderLink whereUpdatedAt($value)
 */
	class DatedReminderLink extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $owner_id Foreign key to users table.
 * @property int|null $list_id Foreign key to lists table.
 * @property int|null $encounter_id Foreign key to form_encounters table.
 * @property int|null $audit_master_id Foreign key to audit_masters table.
 * @property string $url Path of uploaded file.
 * @property string $mimetype Type of uploaded file. Image or text.
 * @property string $revision Timestamp when document was revised.
 * @property string $doc_date When document was uploaded.
 * @property string $hash 40 character SHA-1 hash of document.
 * @property int $imported Parsing status for CCR/CCD/CCDA importing. 0 -> False | 1 -> True
 * @property int $encounter_check If encounter is created while tagging. 0 -> No | 1 -> Yes
 * @property string|null $notes Notes related to documents.
 * @property int $audit_master_approval_status approval_status from audit_master table.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereAuditMasterApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereAuditMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDocDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereEncounterCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereImported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereMimetype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUrl($value)
 */
	class Document extends \Eloquent {}
}

namespace App\Models\Drugs{
/**
 * App\Models\Drugs\Drug
 *
 * @property int $id
 * @property string $related_code Codes
 * @property string $name Name of Drug.
 * @property string $ndc_number NDC Number
 * @property int $on_order On Order.
 * @property float $reorder_point Min Global (In Form)
 * @property float $max_level Max Global (In Form)
 * @property string|null $reactions Reaction of drug.
 * @property float $cyp_factor Quantity representing a years supply
 * @property int $active Is Drug active? 0 -> No | 1 -> Yes
 * @property int $allow_combining Allow filling an order from multiple lots? 0 -> No | 1 -> Yes
 * @property int $allow_multiple Allow multiple lots at one warehouse? 0 -> No | 1 -> Yes
 * @property string|null $drug_code Drug Code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereAllowCombining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereAllowMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCypFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDrugCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereMaxLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereNdcNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereOnOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereReactions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereRelatedCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereReorderPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 */
	class Drug extends \Eloquent {}
}

namespace App\Models\Drugs{
/**
 * App\Models\Drugs\DrugInventory
 *
 * @property int $id
 * @property int $drug_id Foreign key to drugs table.
 * @property int $warehouse_id Foreign key to product_warehouses table.
 * @property string|null $lot_number LOT Number. Unique Number for drugs.
 * @property string|null $expiration Expiry Date of Drug.
 * @property string|null $manufacturer Manufacturer of Drug.
 * @property int $on_hand Count of drug already in inventory.
 * @property int $vendor_id Vendor.
 * @property string|null $destroy_date Date when drug is destroyed.
 * @property string|null $destroy_method Method used to destroy drug.
 * @property string|null $destroy_witness Witness at the time of destruction.
 * @property string|null $destroy_notes Extra information.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereDestroyDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereDestroyMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereDestroyNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereDestroyWitness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereLotNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereOnHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugInventory whereWarehouseId($value)
 */
	class DrugInventory extends \Eloquent {}
}

namespace App\Models\Drugs{
/**
 * App\Models\Drugs\DrugSale
 *
 * @property int $id
 * @property int $drug_id Foreign key to drugs table.
 * @property int $inventory_id Foreign key to drug_inventories table.
 * @property int|null $prescription_id Foreign key to prescriptions table.
 * @property int $patient_id Foreign key to patients table.
 * @property int|null $encounter_id Foreign key to form_encounters table.
 * @property int $user_id Foreign key to users table.
 * @property int|null $distributor_id Distributor of drug. Foreign key to users table.
 * @property string $sale_date Date when drug is sold.
 * @property int $quantity Quantity of drug sold
 * @property float $fee Fees of Drugs.
 * @property int $billed If the sale is posted to accounting? 0 -> No | 1 -> Yes
 * @property string|null $notes Notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereBilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereDistributorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale wherePrescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereSaleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSale whereUserId($value)
 */
	class DrugSale extends \Eloquent {}
}

namespace App\Models\Drugs{
/**
 * App\Models\Drugs\DrugTemplate
 *
 * @property int $id
 * @property int $drug_id Foreign Key to drugs table.
 * @property string $selector Selector. Name of Template.
 * @property string $dosage Schedule.
 * @property int $period Interval
 * @property int $quantity Quantity
 * @property int $refills Refills
 * @property string|null $tax_rates Tax Rate.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereDosage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereRefills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereTaxRates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrugTemplate whereUpdatedAt($value)
 */
	class DrugTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EHRGlobal
 *
 * @property int $id Primary Key. Autoincrement
 * @property mixed $settings Store global settings in json format.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal query()
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRGlobal whereUpdatedAt($value)
 */
	class EHRGlobal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EHRList
 *
 * @property int $id
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property string $date Timestamp when list created.
 * @property string $type Type of list. Medications, Allergies, Surgery, Medical Problems, etc.
 * @property string $title Title of that particular type.
 * @property string $begin_date Beginning date of issue.
 * @property string|null $end_date Date of end of this issue. Null if still active.
 * @property int $occurrence Occurrence of this issue. Recurrence, First, Early Recurrence, Late Recurrence,
 *                 and Acute on Chronic.
 * @property string|null $referred_by Who referred this issue.
 * @property int $activity Still Active. 0 -> No | 1 -> Yes
 * @property string|null $comments Comment about that issue.
 * @property int $outcome Outcome of issue.
 * @property string|null $destination Destination.
 * @property string $reaction Reaction of that issue.
 * @property int|null $external_allergy_id External ERX Id.
 * @property int $erx_source 0 -> LibreEHR | 1 -> External
 * @property int $erx_uploaded 0 -> Pending to NewCrop upload | 1 -> Uploaded to NewCrop
 * @property string $modified_date Timestamp when issue modified.
 * @property string $severity_al Severity Level
 * @property int|null $external_id To hold an ID number from some other system, such as another EHR, an assigned ID
 *                 that exists on a proprietary medical device or the like.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList query()
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereBeginDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereErxSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereErxUploaded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereExternalAllergyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereExternalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereModifiedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereOccurrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereOutcome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereReaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereSeverityAl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EHRList whereUserId($value)
 */
	class EHRList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Encounter
 *
 * @property int $id
 * @property int $facility_id Foreign key to facilities table.
 * @property int $patient_id Foreign key to Patients table.
 * @property int $provider_id Foreign key to users table.
 * @property string $date Date of service.
 * @property string $reason Description of this encounter.
 * @property string $facility Facility Name
 * @property string $onset_date The date that the patient reports current issue is linked to.
 * @property string $sensitivity A flag that restrict access for VIPs or anyone who requests it.
 * @property string|null $billing_note An accounting note that applies to just this encounter (but not the patient level,
 *                  or the line-item level.)
 * @property int $calendar_category_id The encounter category which is actually from the calendar categories
 *                  for appointment type.
 * @property int $last_level_billed Flag that tells you if billed to Primary, Secondary, Tertiary Insurance etc.
 *                 This should be an incremental flag as payments get processed.
 * @property int $last_level_closed Refer as above.
 * @property string|null $last_stmt_date Refer as above.
 * @property int $supervisor_id Supervising provider. If any for this visit.
 * @property int $ordering_physician Ordering provider. If any for this visit.
 * @property int $referring_physician Referring provider, if any, for this visit.
 * @property string $invoice_ref_no Billing stuff.
 * @property int $referral_source Should be an ID from the users table. Can be from an address book entry.
 * @property int $billing_facility Facilities table billing entity.
 * @property int|null $external_id External ID
 * @property int|null $eft_number eft number.
 * @property string|null $claim_number Claim Number, Related to insurance
 * @property string|null $document_image Patient Document
 * @property string|null $sequence_number Sequence Number.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereBillingFacility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereBillingNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereCalendarCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereClaimNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereDocumentImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereEftNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereExternalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereFacility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereFacilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereInvoiceRefNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereLastLevelBilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereLastLevelClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereLastStmtDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereOnsetDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereOrderingPhysician($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereReferralSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereReferringPhysician($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereSensitivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereSequenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereSupervisorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encounter whereUpdatedAt($value)
 */
	class Encounter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExtendedLog
 *
 * @property int $id
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign Key to users table.
 * @property string $event Type of Disclosure
 * @property string|null $recipient Recipient of disclosure.
 * @property string|null $description Description of Disclosure.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtendedLog whereUserId($value)
 */
	class ExtendedLog extends \Eloquent {}
}

namespace App\Models\Facilities{
/**
 * App\Models\Facilities\Facility
 *
 * @property int $id
 * @property int $address_id Foreign key Addresses table
 * @property string $name Facility Name
 * @property string $federal_ein Tax Identifier for the business.
 * @property string $phone Phone Number
 * @property string $fax Fax Number
 * @property string $website Web Site
 * @property string $email Email
 * @property int $service_location Type of facility that shows up in the encounter form as a Service Location.
 * @property int $billing_location Shows up in the form_encounter in the dropdown for Billing Facility.
 * @property int $accept_assignment Flag to control payments processing.
 * @property int $pos_code Vital code that is pulled from the Service Facility in an encounter that indicates
 *                  what type of place of service it is, such as Office, Inpatient Hospital, Home, Mental Health Facility,
 *                   etc.
 * @property string $attn Field of value like Claims Department, or John the Billing Desk Guy
 * @property string $domain_identifier
 * @property string $facility_npi Defines Group National Provider Identifier, or a kind of UUID.
 * @property string $tax_id_type Indicates that if it is a Employer ID Number or Personal Tax Number.
 * @property string $color To mark the physical location of a appointment is so the user can visually
 *                 sort them.
 * @property int $primary_business_entity Identifies if this facility is a listing for the actual business running
 *                 everything. 0 -> False | 1 -> True
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address $address
 * @method static \Database\Factories\Facilities\FacilityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Facility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Facility query()
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereAcceptAssignment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereAttn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereBillingLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereDomainIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereFacilityNpi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereFederalEin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility wherePosCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility wherePrimaryBusinessEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereServiceLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereTaxIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facility whereWebsite($value)
 */
	class Facility extends \Eloquent {}
}

namespace App\Models\Facilities{
/**
 * App\Models\Facilities\FacilityUser
 *
 * @property int $id
 * @property int $is_default Is the current facility default? Note that it must be updated if any edit in UI.
 * @property int $user_id User Id
 * @property int $facility_id Facility Id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Facilities\FacilityUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser whereFacilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityUser whereUserId($value)
 */
	class FacilityUser extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\Form
 *
 * @property int $id
 * @property int $encounter_id Foreign key to encounters table.
 * @property int $patient_id Foreign key to patients table.
 * @property int $user_id Foreign key to users table. User who is registering form.
 * @property int $form_id Id of form which is related to that encounter.
 *                 Basically this is like, an encounter for a particular patient can have many forms and a single
 *                  form can be related to other patient as well.
 * @property string $form_name Name of form, like bronchitis, ankle injury, etc.
 * @property int $is_authorized Is form authorized by physician or doctor? 0 -> No, 1 -> yes
 * @property int $is_deleted Is form deleted from patient encounter? 0 -> No, 1 -> yes
 * @property string|null $form_directory Directory of form.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Form newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form query()
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereFormDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereFormName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereIsAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereIsDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereUserId($value)
 */
	class Form extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormAftercarePlan
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be
 * 	    user, but when an encounter has a fee sheet filled out (billing table items are associated with that encounter
 * 	    number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $is_authorized Means a clinician (physician, etc...)
 *             has verified this form as part of the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string $client_name Name of Patient.
 * @property string $admit_date Date when patient is admitted
 * @property string|null $discharged Date when patient is discharged.
 * @property string|null $goal_a_acute_intoxication Look at form UI.
 * @property string|null $goal_a_acute_intoxication_I Look at form UI.
 * @property string|null $goal_a_acute_intoxication_II Look at form UI.
 * @property string|null $goal_b_emotional_behavioral_conditions Look at form UI.
 * @property string|null $goal_b_emotional_behavioral_conditions_I Look at form UI.
 * @property string|null $goal_c_relapse_potential Look at form UI.
 * @property string|null $goal_c_relapse_potential_I Look at form UI.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereAdmitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereDischarged($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalAAcuteIntoxication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalAAcuteIntoxicationI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalAAcuteIntoxicationII($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalBEmotionalBehavioralConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalBEmotionalBehavioralConditionsI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalCRelapsePotential($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereGoalCRelapsePotentialI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereIsAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAftercarePlan whereUserId($value)
 */
	class FormAftercarePlan extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormAnkleInjury
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to
 *              be user, but when an encounter has a fee sheet filled out (billing table items are associated with that
 *              encounter number) then the fee sheet sets the Provider fields to equal the Rendering
 *              Provider choice in the fee sheet
 * @property int $is_authorized Means a clinician (physician, etc...) has verified this form as part of the client
 *                 record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string $date Date when this form filled.
 * @property string $ankle_date_of_injury Date of Injury.
 * @property int $ankle_work_related O -> Off, 1 -> On
 * @property string|null $ankle_foot Which foot is? Left or right?
 * @property string|null $ankle_severity_of_pain Pain Severity
 * @property int $ankle_significant_swelling 0 -> no significant swelling | 1 -> There is significant swelling.
 * @property string|null $ankle_onset_of_swelling When swelling happened? Like within minutes or hours
 * @property string|null $ankle_how_did_injury_occur Reason for injury.
 * @property string|null $ankle_ottawa_bone_tenderness Bone Tenderness
 * @property int $ankle_able_to_bear_weight_steps Whether able to bear weight? 0 -> No | 1 -> Yes
 * @property string $ankle_x_ray_interpretation Interpretation of X-Ray
 * @property string|null $ankle_additional_x_ray_notes Additional X-Ray Notes.
 * @property string|null $ankle_diagnosis_1 Further Diagnosis.
 * @property string|null $ankle_diagnosis_2 Further Diagnosis.
 * @property string|null $ankle_diagnosis_3 Further Diagnosis.
 * @property string|null $ankle_diagnosis_4 Further Diagnosis.
 * @property string $ankle_plan Prescription by doctor
 * @property string|null $ankle_additional_diagnosis Additional Diagnosis.
 * @property string|null $cpt_codes CPT Code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleAbleToBearWeightSteps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleAdditionalDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleAdditionalXRayNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleDateOfInjury($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleDiagnosis1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleDiagnosis2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleDiagnosis3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleDiagnosis4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleFoot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleHowDidInjuryOccur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleOnsetOfSwelling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleOttawaBoneTenderness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnklePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleSeverityOfPain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleSignificantSwelling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleWorkRelated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereAnkleXRayInterpretation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereCptCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereIsAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnkleInjury whereUserId($value)
 */
	class FormAnkleInjury extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormAnnotateDiagram
 *
 * @property int $id
 * @property int $encounter_id Foreign key to encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet filled
 *                  out (billing table items are associated with that encounter number) then the fee sheet sets the
 *                  Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string|null $data Annotated Data.
 * @property string|null $image_data Image Data directory
 * @property string $dyn_title Diagram name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereDynTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereImageData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormAnnotateDiagram whereUserId($value)
 */
	class FormAnnotateDiagram extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormBronchitis
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of the
 *                 client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string $date_of_illness Bronchitis date of illness.
 * @property string|null $hpi HPI
 * @property int $ops_fever 0 -> No | 1 -> Yes
 * @property int $ops_cough 0 -> No | 1 -> Yes
 * @property int $ops_dizziness 0 -> No | 1 -> Yes
 * @property int $ops_chest_pain 0 -> No | 1 -> Yes
 * @property int $ops_dyspnea 0 -> No | 1 -> Yes
 * @property int $ops_sweating 0 -> No | 1 -> Yes
 * @property int $ops_wheezing 0 -> No | 1 -> Yes
 * @property int $ops_malaise 0 -> No | 1 -> Yes
 * @property int $ops_sputum 0 -> No | 1 -> Yes
 * @property string $ops_appearance Appearance
 * @property int $ops_all_reviewed 0 -> No | 1 -> Yes
 * @property int $review_of_pmh 0 -> No | 1 -> Yes
 * @property int $review_of_allergies 0 -> No | 1 -> Yes
 * @property int $review_of_sh 0 -> No | 1 -> Yes | Social History
 * @property int $review_of_fh 0 -> No | 1 -> Yes | Family History
 * @property int $tms_normal_right 0 -> No | 1 -> Yes
 * @property int $tms_normal_left 0 -> No | 1 -> Yes
 * @property int $nares_normal_right 0 -> No | 1 -> Yes
 * @property int $nares_normal_left 0 -> No | 1 -> Yes
 * @property int $tms_thickened_right 0 -> No | 1 -> Yes
 * @property int $tms_thickened_left 0 -> No | 1 -> Yes
 * @property int $tms_af_level_right 0 -> No | 1 -> Yes
 * @property int $tms_af_level_left 0 -> No | 1 -> Yes
 * @property int $nares_swelling_right 0 -> No | 1 -> Yes
 * @property int $nares_swelling_left 0 -> No | 1 -> Yes
 * @property int $nares_discharge_right 0 -> No | 1 -> Yes
 * @property int $nares_discharge_left 0 -> No | 1 -> Yes
 * @property int $tms_bulging_right 0 -> No | 1 -> Yes
 * @property int $tms_bulging_left 0 -> No | 1 -> Yes
 * @property int $tms_perforated_right 0 -> No | 1 -> Yes
 * @property int $tms_perforated_left 0 -> No | 1 -> Yes
 * @property int $tms_nares_not_examined 0 -> No | 1 -> Yes
 * @property int $no_sinus_tenderness 0 -> No | 1 -> Yes
 * @property int $oropharynx_normal 0 -> No | 1 -> Yes
 * @property int $sinus_tenderness_frontal_right 0 -> No | 1 -> Yes
 * @property int $sinus_tenderness_frontal_left 0 -> No | 1 -> Yes
 * @property int $oropharynx_erythema 0 -> No | 1 -> Yes
 * @property int $oropharynx_exudate 0 -> No | 1 -> Yes
 * @property int $oropharynx_abscess 0 -> No | 1 -> Yes
 * @property int $oropharynx_ulcers 0 -> No | 1 -> Yes
 * @property int $sinus_tenderness_maxillary_right 0 -> No | 1 -> Yes
 * @property int $sinus_tenderness_maxillary_left 0 -> No | 1 -> Yes
 * @property string|null $oropharynx_appearance Oropharnyx Appearance
 * @property int $sinus_tenderness_not_examined 0 -> No | 1 -> Yes
 * @property int $oropharynx_not_examined 0 -> No | 1 -> Yes
 * @property int $heart_pmi 0 -> No | 1 -> Yes
 * @property int $heart_s3 0 -> No | 1 -> Yes
 * @property int $heart_s4 0 -> No | 1 -> Yes
 * @property int $heart_click 0 -> No | 1 -> Yes
 * @property int $heart_rub 0 -> No | 1 -> Yes
 * @property string|null $heart_murmur Murmur
 * @property string|null $heart_grade Grade
 * @property string|null $heart_location Location
 * @property int $heart_normal 0 -> No | 1 -> Yes | Normal Cardiac Exam
 * @property int $heart_not_examined 0 -> No | 1 -> Yes
 * @property int $lungs_bs_normal 0 -> No | 1 -> Yes
 * @property int $lungs_bs_reduced 0 -> No | 1 -> Yes
 * @property int $lungs_bs_increased 0 -> No | 1 -> Yes
 * @property int $lungs_crackles_LLL 0 -> No | 1 -> Yes
 * @property int $lungs_crackles_RLL 0 -> No | 1 -> Yes
 * @property int $lungs_crackles_BLL 0 -> No | 1 -> Yes | Bilateral
 * @property int $lungs_rubs_LLL 0 -> No | 1 -> Yes
 * @property int $lungs_rubs_RLL 0 -> No | 1 -> Yes
 * @property int $lungs_rubs_BLL 0 -> No | 1 -> Yes
 * @property int $lungs_wheezes_LLL 0 -> No | 1 -> Yes
 * @property int $lungs_wheezes_RLL 0 -> No | 1 -> Yes
 * @property int $lungs_wheezes_BLL 0 -> No | 1 -> Yes
 * @property int $lungs_wheezes_DLL 0 -> No | 1 -> Yes
 * @property string|null $diagnostic_tests 0 -> No | 1 -> Yes
 * @property string|null $diagnosis1_form Diagnosis_1
 * @property string|null $diagnosis2_form Diagnosis_2
 * @property string|null $diagnosis3_form Diagnosis_2
 * @property string|null $diagnosis4_form Diagnosis_4
 * @property string|null $additional_diagnosis Additional Diagnosis
 * @property string|null $treatment Treatment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereAdditionalDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDateOfIllness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDiagnosis1Form($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDiagnosis2Form($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDiagnosis3Form($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDiagnosis4Form($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereDiagnosticTests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartMurmur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartNormal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartNotExamined($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartPmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartRub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartS3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHeartS4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereHpi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsBsIncreased($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsBsNormal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsBsReduced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsCracklesBLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsCracklesLLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsCracklesRLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsRubsBLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsRubsLLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsRubsRLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsWheezesBLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsWheezesDLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsWheezesLLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereLungsWheezesRLL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNaresDischargeLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNaresDischargeRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNaresNormalLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNaresNormalRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNaresSwellingLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNaresSwellingRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereNoSinusTenderness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsAllReviewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsChestPain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsCough($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsDizziness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsDyspnea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsFever($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsMalaise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsSputum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsSweating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOpsWheezing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxAbscess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxAppearance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxErythema($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxExudate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxNormal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxNotExamined($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereOropharynxUlcers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereReviewOfAllergies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereReviewOfFh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereReviewOfPmh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereReviewOfSh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereSinusTendernessFrontalLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereSinusTendernessFrontalRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereSinusTendernessMaxillaryLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereSinusTendernessMaxillaryRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereSinusTendernessNotExamined($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsAfLevelLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsAfLevelRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsBulgingLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsBulgingRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsNaresNotExamined($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsNormalLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsNormalRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsPerforatedLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsPerforatedRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsThickenedLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTmsThickenedRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereTreatment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormBronchitis whereUserId($value)
 */
	class FormBronchitis extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormClinicalInstruction
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part
 *                  of the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string|null $instruction Instruction Provided.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereInstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormClinicalInstruction whereUserId($value)
 */
	class FormClinicalInstruction extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormDictation
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string|null $dictation Dictation
 * @property string|null $additional_notes Additional Notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereAdditionalNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereDictation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormDictation whereUserId($value)
 */
	class FormDictation extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormMiscBillingOption
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                  the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property int $employment_related 0 -> No | 1 -> Yes
 * @property int $auto_accident 0 -> No | 1 -> Yes
 * @property string $accident_state Accident State Code
 * @property int $other_accident 0 -> No | 1 -> Yes
 * @property string|null $medicaid_referral_code Medical Referral Code. In UI it is EPSDT Referral Code.
 * @property int $epsdt_flag EPSDT Flag
 * @property string|null $provider_qualifier_code Provider Qualifier Code
 * @property int $is_outside_lab Outside Lab Used? 0 -> No | 1 -> Yes
 * @property string $lab_amount Lab Cost
 * @property int $is_unable_to_work Unable to work. 0- > No | 1 -> Yes
 * @property string|null $off_work_from Date when not able to work.
 * @property string|null $off_work_to Date till not able to work. It is to be noticed that if this field
 *                 ( and off_work_from) is filled then only is_unable_to_work is true else not.
 * @property int $is_hospitalised Is patient hospitalised? 0 -> No | 1 -> Yes
 * @property string|null $hospitalization_date_from Date when hospitalised.
 * @property string|null $hospitalization_date_to Date till hospitalised. If this and hospitalization_date_from is filled then
 *                 only is_hospitalised is true.
 * @property string|null $medicaid_resubmission_code ICD9 Code
 * @property string|null $medicaid_original_reference Reference Number
 * @property string $prior_auth_number Authorization Number.
 * @property string|null $comments Comment
 * @property int $replacement_claim X12 Replacement Claim
 * @property string $icn_resubmission_number X12 ICN Resubmission Number
 * @property string $box_14_date_equal onset_date from form_encounter.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereAccidentState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereAutoAccident($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereBox14DateEqual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereEmploymentRelated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereEpsdtFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereHospitalizationDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereHospitalizationDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereIcnResubmissionNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereIsHospitalised($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereIsOutsideLab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereIsUnableToWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereLabAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereMedicaidOriginalReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereMedicaidReferralCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereMedicaidResubmissionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereOffWorkFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereOffWorkTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereOtherAccident($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption wherePriorAuthNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereProviderQualifierCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereReplacementClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormMiscBillingOption whereUserId($value)
 */
	class FormMiscBillingOption extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormNote
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property string $note_type Type of Note. Viz Work Note or School Note.
 * @property string $message Message in Note.
 * @property string $doctor Doctor giving this note.
 * @property string $signature_date When note created by doctor.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereDoctor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereNoteType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereSignatureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormNote whereUserId($value)
 */
	class FormNote extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormPainMap
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part
 *                  of the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string|null $data Data of annotated form.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPainMap whereUserId($value)
 */
	class FormPainMap extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormPhysicalExam
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part
 *                  of the client record
 * @property string $line_id A kind of key to be used to refer this form.
 * @property int $wnl 0 -> No | 1 -> Yes
 * @property int $abn 0 -> No | 1 -> Yes
 * @property string|null $diagnosis Diagnosis related to this line
 * @property string|null $comments Comments.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereAbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereLineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExam whereWnl($value)
 */
	class FormPhysicalExam extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormPhysicalExamDiagnose
 *
 * @property int $id
 * @property string $line_id Foreign Key. References form_physical_exams table
 * @property int $ordering Diagnosis Order
 * @property string $diagnosis Diagnosis information
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose whereLineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPhysicalExamDiagnose whereUpdatedAt($value)
 */
	class FormPhysicalExamDiagnose extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormPriorAuthorization
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string $auth_number Auth Number
 * @property string|null $comments Comment.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereAuthNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormPriorAuthorization whereUserId($value)
 */
	class FormPriorAuthorization extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormReviewof
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider Initially provider is set
 *             to be user, but when an encounter has a fee sheet filled out (billing table items are associated with that
 *             encounter number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice in
 *             the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property int $fever
 * @property int $chills
 * @property int $night_sweats
 * @property int $weight_loss
 * @property int $poor_appetite
 * @property int $insomnia
 * @property int $fatigued
 * @property int $depressed
 * @property int $hyperactive
 * @property int $exposure_to_foreign_countries
 * @property int $cataracts
 * @property int $cataract_surgery
 * @property int $glaucoma
 * @property int $double_vision
 * @property int $blurred_vision
 * @property int $poor_hearing
 * @property int $headaches
 * @property int $ringing_in_ears
 * @property int $bloody_nose
 * @property int $sinusitis
 * @property int $sinus_surgery
 * @property int $dry_mouth
 * @property int $strep_throat
 * @property int $tonsillectomy
 * @property int $swollen_lymph_nodes
 * @property int $throat_cancer
 * @property int $throat_cancer_surgery
 * @property int $heart_attack
 * @property int $irregular_heart_beat
 * @property int $chest_pains
 * @property int $shortness_of_breath
 * @property int $high_blood_pressure
 * @property int $heart_failure
 * @property int $poor_circulation
 * @property int $vascular_surgery
 * @property int $cardiac_catheterization
 * @property int $coronary_artery_bypass
 * @property int $heart_transplant
 * @property int $stress_test
 * @property int $emphysema
 * @property int $chronic_bronchitis
 * @property int $interstitial_lung_disease
 * @property int $shortness_of_breath_2
 * @property int $lung_cancer
 * @property int $lung_cancer_surgery
 * @property int $pheumothorax
 * @property int $stomach_pains
 * @property int $peptic_ulcer_disease
 * @property int $gastritis
 * @property int $endoscopy
 * @property int $polyps
 * @property int $colonoscopy
 * @property int $colon_cancer
 * @property int $colon_cancer_surgery
 * @property int $ulcerative_colitis
 * @property int $crohns_disease
 * @property int $appendectomy
 * @property int $divirticulitis
 * @property int $divirticulitis_surgery
 * @property int $gall_stones
 * @property int $cholecystectomy
 * @property int $hepatitis
 * @property int $cirrhosis_of_the_liver
 * @property int $splenectomy
 * @property int $kidney_failure
 * @property int $kidney_stones
 * @property int $kidney_cancer
 * @property int $kidney_infections
 * @property int $bladder_infections
 * @property int $bladder_cancer
 * @property int $prostate_problems
 * @property int $prostate_cancer
 * @property int $kidney_transplant
 * @property int $sexually_transmitted_disease
 * @property int $burning_with_urination
 * @property int $discharge_from_urethra
 * @property int $rashes
 * @property int $infections
 * @property int $ulcerations
 * @property int $pemphigus
 * @property int $herpes
 * @property int $osetoarthritis
 * @property int $rheumotoid_arthritis
 * @property int $lupus
 * @property int $ankylosing_sondlilitis
 * @property int $swollen_joints
 * @property int $stiff_joints
 * @property int $broken_bones
 * @property int $neck_problems
 * @property int $back_problems
 * @property int $back_surgery
 * @property int $scoliosis
 * @property int $herniated_disc
 * @property int $shoulder_problems
 * @property int $elbow_problems
 * @property int $wrist_problems
 * @property int $hand_problems
 * @property int $hip_problems
 * @property int $knee_problems
 * @property int $ankle_problems
 * @property int $foot_problems
 * @property int $insulin_dependent_diabetes
 * @property int $noninsulin_dependent_diabetes
 * @property int $hypothyroidism
 * @property int $hyperthyroidism
 * @property int $cushing_syndrom
 * @property int $addison_syndrom
 * @property string|null $additional_notes Notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereAddisonSyndrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereAdditionalNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereAnkleProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereAnkylosingSondlilitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereAppendectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBackProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBackSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBladderCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBladderInfections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBloodyNose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBlurredVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBrokenBones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereBurningWithUrination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCardiacCatheterization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCataractSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCataracts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereChestPains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereChills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCholecystectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereChronicBronchitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCirrhosisOfTheLiver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereColonCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereColonCancerSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereColonoscopy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCoronaryArteryBypass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCrohnsDisease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereCushingSyndrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDepressed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDischargeFromUrethra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDivirticulitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDivirticulitisSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDoubleVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereDryMouth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereElbowProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereEmphysema($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereEndoscopy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereExposureToForeignCountries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereFatigued($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereFever($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereFootProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereGallStones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereGastritis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereGlaucoma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHandProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHeadaches($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHeartAttack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHeartFailure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHeartTransplant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHepatitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHerniatedDisc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHerpes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHighBloodPressure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHipProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHyperactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHyperthyroidism($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereHypothyroidism($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereInfections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereInsomnia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereInsulinDependentDiabetes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereInterstitialLungDisease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereIrregularHeartBeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereKidneyCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereKidneyFailure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereKidneyInfections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereKidneyStones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereKidneyTransplant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereKneeProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereLungCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereLungCancerSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereLupus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereNeckProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereNightSweats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereNoninsulinDependentDiabetes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereOsetoarthritis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePemphigus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePepticUlcerDisease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePheumothorax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePolyps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePoorAppetite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePoorCirculation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof wherePoorHearing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereProstateCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereProstateProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereRashes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereRheumotoidArthritis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereRingingInEars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereScoliosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereSexuallyTransmittedDisease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereShortnessOfBreath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereShortnessOfBreath2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereShoulderProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereSinusSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereSinusitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereSplenectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereStiffJoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereStomachPains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereStrepThroat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereStressTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereSwollenJoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereSwollenLymphNodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereThroatCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereThroatCancerSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereTonsillectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereUlcerations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereUlcerativeColitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereVascularSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereWeightLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormReviewof whereWristProblems($value)
 */
	class FormReviewof extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormRos
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider Initially provider is set
 *             to be user, but when an encounter has a fee sheet filled out (billing table items are associated with that
 *             encounter number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice in
 *             the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property int $weight_change
 * @property int $weakness
 * @property int $fatigue
 * @property int $anorexia
 * @property int $fever
 * @property int $chills
 * @property int $night_sweats
 * @property int $insomnia
 * @property int $irritability
 * @property int $heat_or_cold
 * @property int $intolerance
 * @property int $change_in_vision
 * @property int $glaucoma_history
 * @property int $eye_pain
 * @property int $irritation
 * @property int $redness
 * @property int $excessive_tearing
 * @property int $double_vision
 * @property int $blind_spots
 * @property int $photophobia
 * @property int $hearing_loss
 * @property int $discharge
 * @property int $pain
 * @property int $vertigo
 * @property int $tinnitus
 * @property int $frequent_colds
 * @property int $sore_throat
 * @property int $sinus_problems
 * @property int $post_nasal_drip
 * @property int $nosebleed
 * @property int $snoring
 * @property int $apnea
 * @property int $breast_mass
 * @property int $breast_discharge
 * @property int $biopsy
 * @property int $abnormal_mammogram
 * @property int $cough
 * @property int $sputum
 * @property int $shortness_of_breath
 * @property int $wheezing
 * @property int $hemoptsyis
 * @property int $asthma
 * @property int $copd
 * @property int $chest_pain
 * @property int $palpitation
 * @property int $syncope
 * @property int $pnd
 * @property int $doe
 * @property int $orthopnea
 * @property int $peripheal
 * @property int $edema
 * @property int $legpain_cramping
 * @property int $history_murmur
 * @property int $arrythmia
 * @property int $heart_problem
 * @property int $dysphagia
 * @property int $heartburn
 * @property int $bloating
 * @property int $belching
 * @property int $flatulence
 * @property int $nausea
 * @property int $vomiting
 * @property int $hematemesis
 * @property int $gastro_pain
 * @property int $food_intolerance
 * @property int $hepatitis
 * @property int $jaundice
 * @property int $hematochezia
 * @property int $changed_bowel
 * @property int $diarrhea
 * @property int $constipation
 * @property int $polyuria
 * @property int $polydypsia
 * @property int $dysuria
 * @property int $hematuria
 * @property int $frequency
 * @property int $urgency
 * @property int $incontinence
 * @property int $renal_stones
 * @property int $utis
 * @property int $hesitancy
 * @property int $dribbling
 * @property int $stream
 * @property int $nocturia
 * @property int $erections
 * @property int $ejaculations
 * @property int $g
 * @property int $p
 * @property int $ap
 * @property int $lc
 * @property int $mearche
 * @property int $menopause
 * @property int $lmp
 * @property int $f_frequency
 * @property int $f_flow
 * @property int $f_symptoms
 * @property int $abnormal_hair_growth
 * @property int $f_hirsutism
 * @property int $joint_pain
 * @property int $swelling
 * @property int $m_redness
 * @property int $m_warm
 * @property int $m_stiffness
 * @property int $muscle
 * @property int $m_aches
 * @property int $fms
 * @property int $arthritis
 * @property int $loc
 * @property int $seizures
 * @property int $stroke
 * @property int $tia
 * @property int $n_numbness
 * @property int $n_weakness
 * @property int $paralysis
 * @property int $intellectual_decline
 * @property int $memory_problems
 * @property int $dementia
 * @property int $n_headache
 * @property int $s_cancer
 * @property int $psoriasis
 * @property int $s_acne
 * @property int $s_other
 * @property int $s_disease
 * @property int $p_diagnosis
 * @property int $p_medication
 * @property int $depression
 * @property int $anxiety
 * @property int $social_difficulties
 * @property int $thyroid_problems
 * @property int $diabetes
 * @property int $abnormal_blood
 * @property int $anemia
 * @property int $fh_blood_problems
 * @property int $bleeding_problems
 * @property int $allergies
 * @property int $frequent_illness
 * @property int $hiv
 * @property int $hai_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAbnormalBlood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAbnormalHairGrowth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAbnormalMammogram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAllergies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAnemia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAnorexia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAnxiety($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereApnea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereArrythmia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereArthritis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAsthma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBelching($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBiopsy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBleedingProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBlindSpots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBloating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBreastDischarge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereBreastMass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereChangeInVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereChangedBowel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereChestPain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereChills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereConstipation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereCopd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereCough($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDementia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDepression($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDiabetes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDiarrhea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDischarge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDoe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDoubleVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDribbling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDysphagia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereDysuria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereEdema($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereEjaculations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereErections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereExcessiveTearing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereEyePain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFFlow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFHirsutism($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFSymptoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFatigue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFever($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFhBloodProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFlatulence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFoodIntolerance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFrequentColds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereFrequentIllness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereGastroPain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereGlaucomaHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHaiStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHearingLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHeartProblem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHeartburn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHeatOrCold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHematemesis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHematochezia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHematuria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHemoptsyis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHepatitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHesitancy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHistoryMurmur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereHiv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereIncontinence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereInsomnia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereIntellectualDecline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereIntolerance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereIrritability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereIrritation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereJaundice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereJointPain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereLc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereLegpainCramping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereLmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereLoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMAches($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMRedness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMStiffness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMWarm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMearche($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMemoryProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMenopause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereMuscle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNHeadache($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNNumbness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNWeakness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNausea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNightSweats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNocturia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereNosebleed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereOrthopnea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePMedication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePalpitation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereParalysis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePeripheal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePhotophobia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePolydypsia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePolyuria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePostNasalDrip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos wherePsoriasis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereRedness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereRenalStones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSAcne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSDisease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSeizures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereShortnessOfBreath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSinusProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSnoring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSocialDifficulties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSoreThroat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSputum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereStream($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereStroke($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSwelling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereSyncope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereThyroidProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereTia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereTinnitus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereUrgency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereUtis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereVertigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereVomiting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereWeakness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereWeightChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormRos whereWheezing($value)
 */
	class FormRos extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormSoap
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FormSoap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormSoap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormSoap query()
 */
	class FormSoap extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormTrackAnything
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property int $track_anything_type_id Foreign key to form_track_anything_types..
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part
 *                  of the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string|null $comment Comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereTrackAnythingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnything whereUserId($value)
 */
	class FormTrackAnything extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormTrackAnythingResult
 *
 * @property int $id
 * @property int $track_anything_id Foreign key to form_track_anythings table.
 * @property int $track_anything_type_id Foreign key to form_track_anything_types table
 * @property string $date Timestamp of track created.
 * @property string $result Result
 * @property string|null $comment Comment on result.
 * @property string|null $notes Notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereTrackAnythingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereTrackAnythingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingResult whereUpdatedAt($value)
 */
	class FormTrackAnythingResult extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormTrackAnythingType
 *
 * @property int $id
 * @property string $name Name of Type.
 * @property string|null $description Description of Type.
 * @property int $parent Parent of any type. This happens in the case when you edit the type and enters
 *                 a position of another type. Initially it will contain 0 as default value, indicating no parent.
 * @property int $position At which position it should appear in the list.
 * @property int $active Whether this type is enabled or not. Disable from Configure Track.
 *                  0 -> False | 1 -> True.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTrackAnythingType whereUpdatedAt($value)
 */
	class FormTrackAnythingType extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormTransferSummary
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set to be user, but when an encounter has a fee sheet
 *                 filled out (billing table items are associated with that encounter number) then the fee sheet sets
 *                 the Provider fields to equal the Rendering Provider choice in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string $client_name This is basically patient name.
 * @property string $transfer_to To whom it is transferred?
 * @property string $transfer_date When transfer is done?
 * @property string|null $status_of_admission State of Admission"
 * @property string|null $diagnosis Diagnosis
 * @property string|null $intervention_provided Intervention
 * @property string|null $overall_status_of_discharge Status of Discharge
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereInterventionProvided($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereOverallStatusOfDischarge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereStatusOfAdmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereTransferDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereTransferTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTransferSummary whereUserId($value)
 */
	class FormTransferSummary extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormTreatmentPlan
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table.
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider Initially provider is set
 *             to be user, but when an encounter has a fee sheet filled out (billing table items are associated with that
 *             encounter number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice in
 *             the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part of
 *                 the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property string $client_name Patient Name
 * @property string $admit_date When Patient was Admitted.
 * @property string|null $presenting_issues Issues
 * @property string|null $patient_history Patient History
 * @property string|null $medications Medication
 * @property string|null $extra_info Extra Information
 * @property string|null $diagnosis Diagnosis Report.
 * @property string|null $treatment_received Treatment given to Patient.
 * @property string|null $follow_up_recommendations Follow up recommendations.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereAdmitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereExtraInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereFollowUpRecommendations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereMedications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan wherePatientHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan wherePresentingIssues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereTreatmentReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormTreatmentPlan whereUserId($value)
 */
	class FormTreatmentPlan extends \Eloquent {}
}

namespace App\Models\Forms{
/**
 * App\Models\Forms\FormVital
 *
 * @property int $id
 * @property int $encounter_id Foreign key to form_encounters table
 * @property int $patient_id Foreign Key to patients table.
 * @property int $user_id Foreign key to users table.
 * @property int $provider_id Initially provider is set
 *             to be user, but when an encounter has a fee sheet filled out (billing table items are associated with
 *             that encounter number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice
 *             in the fee sheet
 * @property string $date Date when this form filled.
 * @property int $authorized Means a clinician (physician, etc...) has verified this form as part
 *                 of the client record
 * @property int $activity A delete flag. 0 -> Yes | 1 -> No
 * @property float $bps BP Systolic
 * @property float $bpd BP Diastolic
 * @property float $weight Weight of Patient.
 * @property float $height Height of Person.
 * @property float $temperature Temperature
 * @property float|null $temp_method Temp Location
 * @property float $pulse Pulse Rate
 * @property float $respiration Respiration
 * @property float $bmi Body Mass Index
 * @property float $waist_circumference Waist Circumference
 * @property float $head_circ Head Circumference
 * @property float $oxygen_saturation Percentage Oxygen Saturation
 * @property int|null $external_id To hold an ID number from some other system, such as another EHR, an assigned ID
 *                 that exists on a proprietary medical device or the like.
 * @property string|null $note Note
 * @property string|null $BMI_status BMI status.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereBMIStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereBmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereBpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereBps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereEncounterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereExternalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereHeadCirc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereOxygenSaturation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital wherePulse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereRespiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereTempMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereWaistCircumference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormVital whereWeight($value)
 */
	class FormVital extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HistoryData
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property mixed|null $risk_factors Stores risk factors.The field name is key and boolean is value.
 * @property mixed|null $exams Stores exams/test data.
 * @property mixed|null $history_mother Stores mother's history with diagnosis code.
 * @property mixed|null $history_father Stores father's history with diagnosis code.
 * @property mixed|null $history_siblings Stores siblings's history with diagnosis code.
 * @property mixed|null $history_offspring Stores children's history with diagnosis code.
 * @property mixed|null $history_spouse Stores wife's history with diagnosis code.
 * @property string|null $relatives_cancer Cancer information of relatives.
 * @property string|null $relatives_diabetes Diabetes information of relatives
 * @property string|null $relatives_tuberculosis Tuberculosis information of relatives
 * @property string|null $relatives_high_blood_pressure Blood Pressure information of relatives
 * @property string|null $relatives_heart_problems Heart Related information of relatives
 * @property string|null $relatives_stroke Stroke information of relatives.
 * @property string|null $relatives_epilepsy Epilepsy information of relatives.
 * @property string|null $relatives_mental_illness Mental illeness information of relatives.
 * @property mixed|null $coffee Coffee data in json format.
 * @property mixed|null $tobacco Tobacco data.
 * @property mixed|null $alcohol Alcohol data.
 * @property string|null $sleep_patterns Sleep Pattern.
 * @property mixed|null $exercise_patterns Exercise Pattern.
 * @property string|null $seat_belt_use Seat belt Use.
 * @property mixed|null $counseling Counselling
 * @property mixed|null $hazardous_activities Hazardous Activities
 * @property mixed|null $recreational_drugs Recreational Drugs.
 * @property mixed|null $name_value Name-Value Pair
 * @property string|null $additional_history Additional History.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData query()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereAdditionalHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereAlcohol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereCoffee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereCounseling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereExams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereExercisePatterns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereHazardousActivities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereHistoryFather($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereHistoryMother($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereHistoryOffspring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereHistorySiblings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereHistorySpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereNameValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRecreationalDrugs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesCancer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesDiabetes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesEpilepsy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesHeartProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesHighBloodPressure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesMentalIllness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesStroke($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRelativesTuberculosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereRiskFactors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereSeatBeltUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereSleepPatterns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereTobacco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryData whereUpdatedAt($value)
 */
	class HistoryData extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10GemDx109
 *
 * @property int $id
 * @property string|null $dx_icd10_source ICD 10 Source.
 * @property string|null $dx_icd9_target ICD 9 target.
 * @property string|null $flags Flags
 * @property int $active Is code active? 0 -> No  | 1 -> Yes
 * @property int $revision Revision of code.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereDxIcd10Source($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereDxIcd9Target($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx109 whereUpdatedAt($value)
 */
	class Icd10GemDx109 extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10GemDx910
 *
 * @property int $id
 * @property string|null $dx_icd9_source CD 9 Source.
 * @property string|null $dx_icd10_target ICD 10 target.
 * @property string|null $flags Flags
 * @property int $active Is code active? 0 -> No  | 1 -> Yes
 * @property int $revision Revision of code.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereDxIcd10Target($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereDxIcd9Source($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemDx910 whereUpdatedAt($value)
 */
	class Icd10GemDx910 extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10GemPcs109
 *
 * @property int $id
 * @property string|null $pcs_icd10_source ICD 10 Source.
 * @property string|null $pcs_icd9_target ICD 9 target.
 * @property string|null $flags Flags
 * @property int $active Is code active? 0 -> No  | 1 -> Yes
 * @property int $revision Revision of code.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 whereFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 wherePcsIcd10Source($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 wherePcsIcd9Target($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs109 whereUpdatedAt($value)
 */
	class Icd10GemPcs109 extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10GemPcs910
 *
 * @property int $id
 * @property string|null $pcs_icd9_source ICD 9 Source.
 * @property string|null $pcs_icd10_target ICD 10 target.
 * @property string|null $flags Flags
 * @property int $active Is code active? 0 -> No  | 1 -> Yes
 * @property int $revision Revision of code.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 whereFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 wherePcsIcd10Target($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 wherePcsIcd9Source($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10GemPcs910 whereUpdatedAt($value)
 */
	class Icd10GemPcs910 extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10PcsOrderCode
 *
 * @property int $id
 * @property string|null $dx_code ICD10 Dx code
 * @property string|null $formatted_dx_code Formatted DX Code
 * @property string|null $valid_for_coding Is it valid for coding?
 * @property string|null $short_desc Short description of that code.
 * @property string|null $long_desc Long description of that code.
 * @property int $active Is code Active? 0 -> No | 1 -> Yes
 * @property int $revision Revision of code.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereDxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereFormattedDxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereLongDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereShortDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10PcsOrderCode whereValidForCoding($value)
 */
	class Icd10PcsOrderCode extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10ReimbrDx910
 *
 * @property int $id
 * @property string|null $code Code.
 * @property int|null $code_cnt
 * @property string|null $ICD9_01
 * @property string|null $ICD9_02
 * @property string|null $ICD9_03
 * @property string|null $ICD9_04
 * @property string|null $ICD9_05
 * @property string|null $ICD9_06
 * @property int $active Is code active? 0 -> No | 1 -> Yes
 * @property int $revision Code Revision
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereCodeCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereICD901($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereICD902($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereICD903($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereICD904($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereICD905($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereICD906($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrDx910 whereUpdatedAt($value)
 */
	class Icd10ReimbrDx910 extends \Eloquent {}
}

namespace App\Models\ICD10{
/**
 * App\Models\ICD10\Icd10ReimbrPcs910
 *
 * @property int $id
 * @property string|null $code Code.
 * @property int|null $code_cnt
 * @property string|null $ICD9_01
 * @property string|null $ICD9_02
 * @property string|null $ICD9_03
 * @property string|null $ICD9_04
 * @property string|null $ICD9_05
 * @property string|null $ICD9_06
 * @property int $active Is code active? 0 -> No | 1 -> Yes
 * @property int $revision Code Revision
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereCodeCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereICD901($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereICD902($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereICD903($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereICD904($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereICD905($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereICD906($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icd10ReimbrPcs910 whereUpdatedAt($value)
 */
	class Icd10ReimbrPcs910 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Immunization
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $administered_by Foreign key to users table.
 * @property int $created_by User who created record. Foreign key to users table.
 * @property int $updated_by User who updated record. Foreign key to users table.
 * @property string $administered_date Date when administered.
 * @property int $cvx_code CVX Code Number
 * @property string|null $manufacturer Manufacturer
 * @property string|null $lot_number LOT Number of Vaccine.
 * @property string|null $education_date Date when Immunization Information Statements Given.
 * @property string|null $vis_date Date of VIS statement.
 * @property string|null $note Note about immunization.
 * @property float $amount_administered Amount of vaccine administered.
 * @property string $amount_administered_unit Unit in which vaccine administered.
 * @property string|null $expiration_date Date when vaccine expires.
 * @property string|null $route Route for administration.
 * @property string|null $administration_site Administration Site
 * @property int $added_erroneously 0 -> False | 1 -> True
 * @property int|null $external_id To hold an ID number from some other system, such as another EHR, an assigned ID
 *                 that exists on a proprietary medical device or the like.
 * @property int $status 0 -> None | 1 -> Completed | 2 -> Refused | 3 -> Not Administered |
 *                 4 -> Partially Administered
 * @property string|null $information_source Information Source
 * @property string|null $refusal_reason Refusal Reason
 * @property int|null $ordering_provider_id Ordering Provider
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereAddedErroneously($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereAdministeredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereAdministeredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereAdministrationSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereAmountAdministered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereAmountAdministeredUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereCvxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereEducationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereExternalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereInformationSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereLotNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereOrderingProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereRefusalReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Immunization whereVisDate($value)
 */
	class Immunization extends \Eloquent {}
}

namespace App\Models\Insurance{
/**
 * App\Models\Insurance\InsuranceCompany
 *
 * @property int $id Primary Key. Autoincrement
 * @property int $address_id Foreign Key to addresses table.
 * @property int $x12_partner_id Foreign key to x12_partners. The real clearinghouse partner key,
 *                  and is related to cms_id
 * @property string|null $attn Attn. Eg : Billing Department
 * @property string $cms_id Insurance company identifier supplied by
 * 	        x12_default_partner published list. NOT a UUID like an NPI or tax number.
 * 	        Refer to Clearinghouse Payer List for value.
 * @property int|null $ins_type_code Payer Type ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereAttn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereCmsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereInsTypeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceCompany whereX12PartnerId($value)
 */
	class InsuranceCompany extends \Eloquent {}
}

namespace App\Models\Insurance{
/**
 * App\Models\Insurance\InsuranceData
 *
 * @property int $id
 * @property int $type Insurance data. 0 -> Primary | 1 -> Secondary | 2 -> Tertiary
 * @property int $provider_id Foreign key to insurance_companies table.
 * @property int|null $subscriber_address_id Address of Subscriber. Foreign key to addresses table.
 * @property int|null $employer_address_id Address of employer. Foreign key to addresses table.
 * @property int $patient_id Foreign Key to patients table.
 * @property string $plan_name Insurance Plan.
 * @property string $policy_number Policy Number.
 * @property string $group_number Group Number
 * @property string $subscriber_first_name Subscriber's First Name.
 * @property string $subscriber_last_name Subscriber's Last name.
 * @property string|null $subscriber_middle_name Subscriber's Middle name.
 * @property string $subscriber_relationship Relationship of subscriber with patient.
 * @property string $subscriber_dob Date of birth of subscriber.
 * @property string $subscriber_sex Sex of subscriber.
 * @property string|null $subscriber_phone Phone number of subscriber.
 * @property string|null $subscriber_employer Employer of subscriber.
 * @property string|null $copay Co Pay
 * @property string $sDate Start date of insurance.
 * @property string $eDate End date of insurance
 * @property int $accept_assignment 0 -> False | 1 -> True
 * @property string $policy_type Policy Type
 * @property int $inactive Is insurance active? 0 -> False | 1 -> True
 * @property string $inactive_time Time since inactive.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereAcceptAssignment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereCopay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereEDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereEmployerAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereGroupNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereInactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereInactiveTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData wherePolicyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData wherePolicyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberEmployer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereSubscriberSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceData whereUpdatedAt($value)
 */
	class InsuranceData extends \Eloquent {}
}

namespace App\Models\Insurance{
/**
 * App\Models\Insurance\InsuranceNumber
 *
 * @property int $id
 * @property int $provider_id Foreign key to users table.
 * @property int $insurance_company_id Foreign key to insurance_companies table.
 * @property string|null $provider_number Provider Number
 * @property string|null $rendering_provider_number Rendering Provider Number
 * @property string|null $provider_number_type Provider Number Type
 * @property string|null $rendering_provider_number_type Rendering Provider Number Type
 * @property string|null $group_number Group Number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereGroupNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereInsuranceCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereProviderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereProviderNumberType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereRenderingProviderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereRenderingProviderNumberType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceNumber whereUpdatedAt($value)
 */
	class InsuranceNumber extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ListDiagnosis
 *
 * @property int $id
 * @property int $list_id Foreign key to lists table.
 * @property string $diagnosis Diagnosis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis whereListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListDiagnosis whereUpdatedAt($value)
 */
	class ListDiagnosis extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OfficeNote
 *
 * @property int $id
 * @property int $user_id Foreign Key to users table.
 * @property string|null $body Note content
 * @property int $activity Is note active? 0 -> No | 1 -> Yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeNote whereUserId($value)
 */
	class OfficeNote extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\Patient
 *
 * @property int $id
 * @property string $title Title Mr., Ms., Mrs., etc.
 * @property string $occupation Patient occupation
 * @property string $industry Industry in which patient works.
 * @property int $address_id Foreign key for address linking to patient.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Patients\PatientFaceSheet|null $faceSheet
 * @property-read \App\Models\Patients\PatientHistory|null $history
 * @method static \Database\Factories\Patients\PatientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereIndustry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 */
	class Patient extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientContact
 *
 * @property int $id
 * @property int $provider_id Provider Id
 * @property int $reference_provider_id Reference Provider Id
 * @property string $home_phone Contact home phone
 * @property string $work_phone Contact business phone
 * @property string $contact_phone Personal contact phone number.
 * @property string $contact_relationship what relationship does contact have with patient.
 * @property string $patient_email Additional field added. Contact email id.
 * @property string $county county
 * @property int|null $country_id Country code of patient contact
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Patients\PatientContactFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereContactRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereHomePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact wherePatientEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereReferenceProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContact whereWorkPhone($value)
 */
	class PatientContact extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientContactCommunication
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $contact_id Foreign key for patient contacts linking.
 * @property int $mail_mode Allow through email. Initially set to be 0. Previously hippa_mail.
 * @property int $voice_mode Allow voice message. Initially set to be 0. Previously hippa_voice.
 * @property int $message_mode Allow text sms. Initially set to be 0. Previously hippa_allow_sms.
 * @property string $message What message to be sent. Previously hippa_message.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Patients\PatientContactCommunicationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereMailMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereMessageMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactCommunication whereVoiceMode($value)
 */
	class PatientContactCommunication extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientContactLink
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $contact_id Foreign key for patient contacts linking.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Patients\PatientContactLinkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientContactLink whereUpdatedAt($value)
 */
	class PatientContactLink extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientEmployer
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $address_id Foreign key to addresses table.
 * @property string $name Employers Name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Patients\PatientEmployerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientEmployer whereUpdatedAt($value)
 */
	class PatientEmployer extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientFaceSheet
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property string $first_name First Name
 * @property string|null $middle_name Middle Name - Optional
 * @property string $last_name Last Name
 * @property string $dob Date of Birth
 * @property string $marital_status Marital Status
 * @property string $license_id License Id
 * @property string $email Email
 * @property string $sex Sex
 * @property string|null $billing_note Billing Note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $age
 * @property-read \App\Models\Patients\Patient $patient
 * @method static \Database\Factories\Patients\PatientFaceSheetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereBillingNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereLicenseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientFaceSheet whereUpdatedAt($value)
 */
	class PatientFaceSheet extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientHistory
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property string|null $cataract_surgery Cataract Surgery Date
 * @property string|null $tonsillectomy Tonsillectomy Date
 * @property string|null $cholecystestomy cholecystestomy Surgery Date
 * @property string|null $heart_surgery Heart Surgery Date
 * @property string|null $hysterectomy Hysterectomy Date
 * @property string|null $hernia_repair Hernia Repair Date
 * @property string|null $hip_replacement Hip Replacement Date
 * @property string|null $knee_replacement Heart Surgery Date
 * @property string|null $appendectomy Appendectomy Date
 * @property mixed $exams Exams performed on patient
 * @property mixed $risk_factors Risk Factors patient has
 * @property mixed $extra_fields Extra Fields
 * @property string $additional_history Additional History
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patients\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereAdditionalHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereAppendectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereCataractSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereCholecystestomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereExams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereExtraFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereHeartSurgery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereHerniaRepair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereHipReplacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereHysterectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereKneeReplacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereRiskFactors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereTonsillectomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientHistory whereUpdatedAt($value)
 */
	class PatientHistory extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientNote
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property int $user_id Foreign key to users table
 * @property int $assigned_to Foreign key to users table. It is basically that user whom that note is assigned
 * @property string $date Timestamp at which date is created.
 * @property string|null $body Message sent by user.
 * @property int $activity Is note active? 0 -> No | 1 -> Yes
 * @property int $authorized Is note authorized? 0 -> No | 1 -> Yes
 * @property string $title Type
 * @property int $deleted Indicates note is deleted. 0 -> No | 1 -> Yes
 * @property string $message_status Status of message
 * @property string|null $portal_relation Patient Portal Relation
 * @property int $is_msg_encrypted Whether message is encrypted? 0 -> No | 1 -> Yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereIsMsgEncrypted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereMessageStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote wherePortalRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientNote whereUserId($value)
 */
	class PatientNote extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientPrivacyContact
 *
 * @property int $id Primary Key. Autoincrement
 * @property int $patient_id Foreign key to patients table
 * @property int $contact_id Foreign key to patient_contacts table.
 * @property int $allow_patient_portal Allow patient portal. Initially allowed to be false.
 * @property int $allow_health_info_ex Allow health information exchange. Initially allowed to be false.
 * @property int $allow_imm_info_share Allow immunization information share. Initially allowed to be false.
 * @property int $allow_imm_reg_use Allow immunization registration info. Initially allowed to be false.
 * @property int $vfc Allow vfc. Initially allowed to be false.
 * @property string $secure_email Previously email_direct. Secure email of patient.
 * @property string|null $deceased_reason Reason for deceasing.
 * @property string|null $deceased_date Deceased date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Patients\PatientPrivacyContactFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereAllowHealthInfoEx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereAllowImmInfoShare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereAllowImmRegUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereAllowPatientPortal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereDeceasedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereDeceasedReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereSecureEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientPrivacyContact whereVfc($value)
 */
	class PatientPrivacyContact extends \Eloquent {}
}

namespace App\Models\Patients{
/**
 * App\Models\Patients\PatientSocialStatistic
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table.
 * @property string $ethnicity Ethnicity.
 * @property string $religion Religion.
 * @property string $interpreter Interpreter
 * @property string $migrant_seasonal Whether Migrant or Seasonal?
 * @property int $family_size Family Size of Patient
 * @property float $monthly_income Monthly income of patient.
 * @property int $homeless Is homeless or not? 0 -> No | 1 -> Yes
 * @property string $financial_review Financial Review Date
 * @property string $language Language.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Patients\PatientSocialStatisticFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereEthnicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereFamilySize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereFinancialReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereHomeless($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereInterpreter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereMigrantSeasonal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereMonthlyIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientSocialStatistic whereUpdatedAt($value)
 */
	class PatientSocialStatistic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pharmacy
 *
 * @property int $id
 * @property int|null $address_id Foreign key to addresses table.
 * @property string $name Name
 * @property string|null $email Email ID.
 * @property string|null $phone Phone Number.
 * @property string|null $website Phone Number.
 * @property string|null $fax_number Fax number.
 * @property int $transit_method Method of Transit. 1 -> Print | 2 -> Email | 3 -> Fax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereFaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereTransitMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacy whereWebsite($value)
 */
	class Pharmacy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prescription
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereUpdatedAt($value)
 */
	class Prescription extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @property int $id
 * @property int $drug_id Foreign key to drugs table.
 * @property string|null $pr_selector Template selector for drugs, empty for codes
 * @property string $level Price Level
 * @property float $price Price of that drug in local currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePrSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 */
	class Price extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductWarehouse
 *
 * @property int $id
 * @property int $drug_id Foreign key to Drugs table.
 * @property string $warehouse Warehouse
 * @property float $min_level Min Level
 * @property float $max_level Max Level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereMaxLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereMinLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductWarehouse whereWarehouse($value)
 */
	class ProductWarehouse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReferralTransaction
 *
 * @property int $id Primary Key. Autoincrement
 * @property int $patient_id Foreign key to patients table
 * @property int $user_id Foreign key to users table.
 * @property int $authorized 0 -> False | 1 -> True
 * @property int $refer_by User who referred this issue. Foreign key to users table.
 * @property int $refer_to User to whom it is referred. Foreign key to users table.
 * @property string $referral_date Date when referred
 * @property int $external_referral Is this referral external? 0 -> No | 1 -> Yes
 * @property string|null $reason Reason for this referral.
 * @property int $risk_level 0 -> Low | 1 -> Medium | 2 -> High
 * @property string $requested_service Diagnosis Codes
 * @property string $referrer_diagnosis Referrer Diagnosis
 * @property int $include_vitals 0 -> False | 1 -> True
 * @property mixed|null $misc Store User created field in key -> value pair form.
 * @property string|null $reply_date Reply Date.
 * @property int|null $reply_from User who replied? Foreign key to users table.
 * @property int|null $prescription_id Prescriptions. Foreign key to prescriptions table.
 * @property int|null $document_id Documents related
 * @property string|null $presumed_diagnosis Presumed Diagnosis
 * @property string|null $final_diagnosis Final Diagnosis.
 * @property string|null $findings Findings.
 * @property string|null $services_provided Diagnosis codes provided.
 * @property string|null $recommendation Recommendations
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereExternalReferral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereFinalDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereFindings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereIncludeVitals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereMisc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction wherePrescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction wherePresumedDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReferBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReferTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReferralDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReferrerDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReplyDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereReplyFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereRequestedService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereRiskLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereServicesProvided($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReferralTransaction whereUserId($value)
 */
	class ReferralTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Tag{
/**
 * App\Models\Tag\TfFilter
 *
 * @property int $id
 * @property int $created_by User who created this filter. Foreign key to users table.
 * @property int $updated_by User who updated this filter. Foreign key to users table.
 * @property int $requesting_action 1 -> Allow | 0 -> Deny
 * @property int $requesting_type 1 -> Group | 0 -> User
 * @property string $requesting_entity Group name or username of the source
 * @property int $object_type 0 -> Tag | 1 -> Patient. Filter object type
 * @property string|null $note Note about filter.
 * @property int $gacl_aro Gacl Field
 * @property int $gacl_acl Gacl Field
 * @property string $effective_datetime Timestamp when filter is active.
 * @property string $expiration_datetime Timestamp till filter is active
 * @property int $priority Priority of filter.
 * @property int $deleted Is filter deleted. 0 -> No  | 1 -> Yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter query()
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereEffectiveDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereExpirationDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereGaclAcl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereGaclAro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereObjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereRequestingAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereRequestingEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereRequestingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfFilter whereUpdatedBy($value)
 */
	class TfFilter extends \Eloquent {}
}

namespace App\Models\Tag{
/**
 * App\Models\Tag\TfPatientTag
 *
 * @property int $id
 * @property int $created_by User who created this tag. Foreign key to users table.
 * @property int $updated_by User who updated this tag. Foreign key to users table.
 * @property int $tag_id Foreign key to tf_tags table.
 * @property int $patient_id Foreign key to patients table.
 * @property int $status 0 -> In-active | 1 -> active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfPatientTag whereUpdatedBy($value)
 */
	class TfPatientTag extends \Eloquent {}
}

namespace App\Models\Tag{
/**
 * App\Models\Tag\TfTag
 *
 * @property int $id
 * @property int $created_by User who created this tag. Foreign key to users table.
 * @property int $updated_by User who updated this tag. Foreign key to users table.
 * @property string $tag_name Tag Name
 * @property string $tag_color Color used to denote this tag on layout.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereTagColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereTagName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TfTag whereUpdatedBy($value)
 */
	class TfTag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int $patient_id Foreign key to patients table
 * @property int $user_id Foreign key to users table.
 * @property int $is_authorized 0 -> False | 1 -> True
 * @property mixed $data Data of other transactions.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereIsAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name User First Name.
 * @property string|null $middle_name User Middle Name.
 * @property string $last_name User Last Name.
 * @property string $username
 * @property string|null $email
 * @property string $password
 * @property string|null $dob Date of Birth
 * @property string|null $profile_picture Profile Picture
 * @property string|null $address_one Address One
 * @property string|null $address_two Address Two
 * @property string|null $zip Zip code
 * @property string $suffix User Suffix e.g Dr, PHD, Mr, Mrs
 * @property string $federal_tax_id Federal Tax ID
 * @property string $federal_drug_id Federal Drug ID. DEA Number
 * @property string $taxonomy Taxonomy
 * @property int $in_calendar If user wants calendar or not. 0 -> No | 1 -> Yes
 * @property int $see_auth See Authorization. 0 -> None | 1 -> All | 2 -> Only Mine
 * @property string $calendar_ui Calendar Preference. viz Outlook, Original and Fancy
 * @property int $npi National Provider Identifier.
 * @property string|null $info About/Biography/Job Description
 * @property string $new_crop_user_role Role of created user. Like admin, nurse, doctor, etc.
 * @property string $access_control Access Control of user. Viz Accounting, Administrators, Clinicians, etc.
 * @property int $active Is user active? 0 -> No, 1 -> Yes.
 * @property int $authorized Is user authorised? 0 -> No, 1 -> Yes.
 * @property \Illuminate\Support\Carbon|null $email_verified_at Email verified
 * @property string|null $phone_verified_at Phone verified
 * @property int $two_factor_auth Two factor auth enabled
 * @property string|null $two_factor_token Two factor auth token
 * @property string|null $two_factor_expiry Two factor expiry date
 * @property string $pwd_expiration_date Set password expiration date. Initially it is set from globals.
 * @property int|null $country_id User's country
 * @property int|null $city_id User's city
 * @property int $schedule_delete Schedule for permanent delete
 * @property int $schedule_deactivate Schedule for deactivation
 * @property string|null $banned_until Time for account to be banned!
 * @property string|null $timezone User's Timezone
 * @property \App\Models\Currency $currency User's Currency
 * @property string|null $device_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $remember_token Remember me token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address|null $address
 * @property-read \Khsing\World\Models\Country|null $country
 * @property-read \Illuminate\Support\Collection $user_permissions
 * @property-read \Illuminate\Support\Collection $user_roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $permissionsTeams
 * @property-read int|null $permissions_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $rolesTeams
 * @property-read int|null $roles_teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|User eloquentQuery($orderBy = 'id', $orderByDir = 'asc', $searchValue = '', $relationships = [])
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBannedUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCalendarUi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHavePermission()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHaveRole()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFederalDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFederalTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInCalendar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNewCropUserRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNpi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePwdExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereScheduleDeactivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereScheduleDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSeeAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTaxonomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZip($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserAddrBook
 *
 * @property int $id Primary Key. Auto Increment.
 * @property int $user_id User Id
 * @property string $title Title
 * @property string $email Email Id of user. Earlier we had two fields email and email_direct. Taking one email id.
 * @property string $url User website url.
 * @property string $assistant Assistant
 * @property string $organization User Organization
 * @property string $valedictory Field that should be converted to something to store credentials, like M.D., so that you do not get user and provider last names like Gupta M.D.
 * @property string $speciality User Speciality like physician, etc.
 * @property string|null $notes To store user notes.
 * @property string $address_book_type Address Book Type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UserAddrBookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereAddressBookType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereAssistant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereSpeciality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddrBook whereValedictory($value)
 */
	class UserAddrBook extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserCommunication
 *
 * @property int $id Primary key. Autoincrement
 * @property int $user_id User Id
 * @property string $contact_number Contact number
 * @property int $type Contact Number Type. 0 -> home_phone | 1 -> work_phone
 *                 | 2 -> mobile | 3 -> fax | 4 -> alternate_work_phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UserCommunicationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCommunication whereUserId($value)
 */
	class UserCommunication extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserPasswordHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserPasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPasswordHistory query()
 */
	class UserPasswordHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserResidentialLink
 *
 * @property int $id
 * @property int $address_id To create link with addresses table.
 * @property int $user_id To create link with user_infos table.
 * @property int $type What type of address is? 0 -> primary address | 1 -> alternate address.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UserResidentialLinkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserResidentialLink whereUserId($value)
 */
	class UserResidentialLink extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSecure
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserSecure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSecure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSecure query()
 */
	class UserSecure extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSetting
 *
 * @property int $id Primary key. Autoincremement.
 * @property int $user_id User Id
 * @property string $setting_label Setting Label
 * @property int $setting_value Setting Value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UserSettingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereSettingLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereSettingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUserId($value)
 */
	class UserSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\X12Partner
 *
 * @property int $id
 * @property string $name x12 Partner Name
 * @property string|null $id_number ID Number (ETIN
 * @property string|null $x12_sender_id X12 Sender ID. ISA 06
 * @property string|null $x12_receiver_id X12 Receiver ID. ISA 08
 * @property string $x12_version Version
 * @property string $processing_format Processing Format
 * @property string $x12_isa_01 User Logon Required Indicator
 * @property string|null $x12_isa_02 User Logon. If 03 in x12_isa_01
 * @property string $x12_isa_03 User Password required indicator.
 * @property string|null $x12_isa_04 User Password. If 01 in x12_isa_03.
 * @property string $x12_isa_05 Sender Id Qualifier.
 * @property string $x12_isa_07 Receiver Id Qualifier
 * @property int $x12_isa_14 Acknowledgement Requested. 0 -> No | 1 -> Yes
 * @property string $x12_isa_15 Usage Indicator. viz Production(P) and Testing(T)
 * @property string $x12_gs_02 Application Sender Code
 * @property string $x12_per_06 Submitted EDI Access No.
 * @property string $x12_gs_03 Application Receiver Code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\X12PartnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereProcessingFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Gs02($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Gs03($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa01($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa02($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa03($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa04($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa05($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa07($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Isa15($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Per06($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12ReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12SenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|X12Partner whereX12Version($value)
 */
	class X12Partner extends \Eloquent {}
}

