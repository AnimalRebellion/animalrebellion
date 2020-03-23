<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LocalGroupRequest as StoreRequest;
use App\Http\Requests\LocalGroupRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class LocalGroupCrudController.
 *
 * @property CrudPanel $crud
 */
class LocalGroupCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\LocalGroup');
        $this->crud->setRoute(config('backpack.base.route_prefix').'/localgroup');
        $this->crud->setEntityNameStrings('localgroup', 'local_groups');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn('name');
        $this->crud->addColumn('address1');
        $this->crud->addColumn('address2');
        $this->crud->addColumn('address3');
        $this->crud->addColumn('city');
        $this->crud->addColumn('state_or_province');
        $this->crud->addColumn('country');
        $this->crud->addColumn('postal_code');

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name',
            'attributes' => [
                'placeholder' => 'Name of the local group',
            ],
        ]);

        $this->crud->addField([
            'name' => 'address1',
            'type' => 'text',
            'label' => 'Address 1',
            'attributes' => [
                'placeholder' => 'Address Line 1',
            ],
        ]);

        $this->crud->addField([
            'name' => 'address2',
            'type' => 'text',
            'label' => 'Address 2',
            'attributes' => [
                'placeholder' => 'Address Line 2',
            ],
        ]);

        $this->crud->addField([
            'name' => 'address3',
            'type' => 'text',
            'label' => 'Address 3',
            'attributes' => [
                'placeholder' => 'Address Line 3',
            ],
        ]);

        $this->crud->addField([
            'name' => 'city',
            'type' => 'text',
            'label' => 'City',
            'attributes' => [
                'placeholder' => 'Local group city',
            ],
        ]);

        $this->crud->addField([
            'name' => 'state_or_province',
            'type' => 'text',
            'label' => 'State/Province',
            'attributes' => [
                'placeholder' => 'State or Province',
            ],
        ]);

        $this->crud->addField([
            'name' => 'country',
            'type' => 'select2_from_array',
            'label' => 'Country',
            'options' => [
                'Afganistan' => 'Afghanistan',
                'Albania' => 'Albania',
                'Algeria' => 'Algeria',
                'American Samoa' => 'American Samoa',
                'Andorra' => 'Andorra',
                'Angola' => 'Angola',
                'Anguilla' => 'Anguilla',
                'Antigua & Barbuda' => 'Antigua & Barbuda',
                'Argentina' => 'Argentina',
                'Armenia' => 'Armenia',
                'Aruba' => 'Aruba',
                'Australia' => 'Australia',
                'Austria' => 'Austria',
                'Azerbaijan' => 'Azerbaijan',
                'Bahamas' => 'Bahamas',
                'Bahrain' => 'Bahrain',
                'Bangladesh' => 'Bangladesh',
                'Barbados' => 'Barbados',
                'Belarus' => 'Belarus',
                'Belgium' => 'Belgium',
                'Belize' => 'Belize',
                'Benin' => 'Benin',
                'Bermuda' => 'Bermuda',
                'Bhutan' => 'Bhutan',
                'Bolivia' => 'Bolivia',
                'Bonaire' => 'Bonaire',
                'Bosnia & Herzegovina' => 'Bosnia & Herzegovina',
                'Botswana' => 'Botswana',
                'Brazil' => 'Brazil',
                'British Indian Ocean Ter' => 'British Indian Ocean Ter',
                'Brunei' => 'Brunei',
                'Bulgaria' => 'Bulgaria',
                'Burkina Faso' => 'Burkina Faso',
                'Burundi' => 'Burundi',
                'Cambodia' => 'Cambodia',
                'Cameroon' => 'Cameroon',
                'Canada' => 'Canada',
                'Canary Islands' => 'Canary Islands',
                'Cape Verde' => 'Cape Verde',
                'Cayman Islands' => 'Cayman Islands',
                'Central African Republic' => 'Central African Republic',
                'Chad' => 'Chad',
                'Channel Islands' => 'Channel Islands',
                'Chile' => 'Chile',
                'China' => 'China',
                'Christmas Island' => 'Christmas Island',
                'Cocos Island' => 'Cocos Island',
                'Colombia' => 'Colombia',
                'Comoros' => 'Comoros',
                'Congo' => 'Congo',
                'Cook Islands' => 'Cook Islands',
                'Costa Rica' => 'Costa Rica',
                'Cote DIvoire' => 'Cote DIvoire',
                'Croatia' => 'Croatia',
                'Cuba' => 'Cuba',
                'Curaco' => 'Curacao',
                'Cyprus' => 'Cyprus',
                'Czech Republic' => 'Czech Republic',
                'Denmark' => 'Denmark',
                'Djibouti' => 'Djibouti',
                'Dominica' => 'Dominica',
                'Dominican Republic' => 'Dominican Republic',
                'East Timor' => 'East Timor',
                'Ecuador' => 'Ecuador',
                'Egypt' => 'Egypt',
                'El Salvador' => 'El Salvador',
                'Equatorial Guinea' => 'Equatorial Guinea',
                'Eritrea' => 'Eritrea',
                'Estonia' => 'Estonia',
                'Ethiopia' => 'Ethiopia',
                'Falkland Islands' => 'Falkland Islands',
                'Faroe Islands' => 'Faroe Islands',
                'Fiji' => 'Fiji',
                'Finland' => 'Finland',
                'France' => 'France',
                'French Guiana' => 'French Guiana',
                'French Polynesia' => 'French Polynesia',
                'French Southern Ter' => 'French Southern Ter',
                'Gabon' => 'Gabon',
                'Gambia' => 'Gambia',
                'Georgia' => 'Georgia',
                'Germany' => 'Germany',
                'Ghana' => 'Ghana',
                'Gibraltar' => 'Gibraltar',
                'Great Britain' => 'Great Britain',
                'Greece' => 'Greece',
                'Greenland' => 'Greenland',
                'Grenada' => 'Grenada',
                'Guadeloupe' => 'Guadeloupe',
                'Guam' => 'Guam',
                'Guatemala' => 'Guatemala',
                'Guinea' => 'Guinea',
                'Guyana' => 'Guyana',
                'Haiti' => 'Haiti',
                'Hawaii' => 'Hawaii',
                'Honduras' => 'Honduras',
                'Hong Kong' => 'Hong Kong',
                'Hungary' => 'Hungary',
                'Iceland' => 'Iceland',
                'Indonesia' => 'Indonesia',
                'India' => 'India',
                'Iran' => 'Iran',
                'Iraq' => 'Iraq',
                'Ireland' => 'Ireland',
                'Isle of Man' => 'Isle of Man',
                'Israel' => 'Israel',
                'Italy' => 'Italy',
                'Jamaica' => 'Jamaica',
                'Japan' => 'Japan',
                'Jordan' => 'Jordan',
                'Kazakhstan' => 'Kazakhstan',
                'Kenya' => 'Kenya',
                'Kiribati' => 'Kiribati',
                'Korea North' => 'Korea North',
                'Korea Sout' => 'Korea South',
                'Kuwait' => 'Kuwait',
                'Kyrgyzstan' => 'Kyrgyzstan',
                'Laos' => 'Laos',
                'Latvia' => 'Latvia',
                'Lebanon' => 'Lebanon',
                'Lesotho' => 'Lesotho',
                'Liberia' => 'Liberia',
                'Libya' => 'Libya',
                'Liechtenstein' => 'Liechtenstein',
                'Lithuania' => 'Lithuania',
                'Luxembourg' => 'Luxembourg',
                'Macau' => 'Macau',
                'Macedonia' => 'Macedonia',
                'Madagascar' => 'Madagascar',
                'Malaysia' => 'Malaysia',
                'Malawi' => 'Malawi',
                'Maldives' => 'Maldives',
                'Mali' => 'Mali',
                'Malta' => 'Malta',
                'Marshall Islands' => 'Marshall Islands',
                'Martinique' => 'Martinique',
                'Mauritania' => 'Mauritania',
                'Mauritius' => 'Mauritius',
                'Mayotte' => 'Mayotte',
                'Mexico' => 'Mexico',
                'Midway Islands' => 'Midway Islands',
                'Moldova' => 'Moldova',
                'Monaco' => 'Monaco',
                'Mongolia' => 'Mongolia',
                'Montserrat' => 'Montserrat',
                'Morocco' => 'Morocco',
                'Mozambique' => 'Mozambique',
                'Myanmar' => 'Myanmar',
                'Nambia' => 'Nambia',
                'Nauru' => 'Nauru',
                'Nepal' => 'Nepal',
                'Netherland Antilles' => 'Netherland Antilles',
                'Netherlands' => 'Netherlands (Holland, Europe)',
                'Nevis' => 'Nevis',
                'New Caledonia' => 'New Caledonia',
                'New Zealand' => 'New Zealand',
                'Nicaragua' => 'Nicaragua',
                'Niger' => 'Niger',
                'Nigeria' => 'Nigeria',
                'Niue' => 'Niue',
                'Norfolk Island' => 'Norfolk Island',
                'Norway' => 'Norway',
                'Oman' => 'Oman',
                'Pakistan' => 'Pakistan',
                'Palau Island' => 'Palau Island',
                'Palestine' => 'Palestine',
                'Panama' => 'Panama',
                'Papua New Guinea' => 'Papua New Guinea',
                'Paraguay' => 'Paraguay',
                'Peru' => 'Peru',
                'Phillipines' => 'Philippines',
                'Pitcairn Island' => 'Pitcairn Island',
                'Poland' => 'Poland',
                'Portugal' => 'Portugal',
                'Puerto Rico' => 'Puerto Rico',
                'Qatar' => 'Qatar',
                'Republic of Montenegro' => 'Republic of Montenegro',
                'Republic of Serbia' => 'Republic of Serbia',
                'Reunion' => 'Reunion',
                'Romania' => 'Romania',
                'Russia' => 'Russia',
                'Rwanda' => 'Rwanda',
                'St Barthelemy' => 'St Barthelemy',
                'St Eustatius' => 'St Eustatius',
                'St Helena' => 'St Helena',
                'St Kitts-Nevis' => 'St Kitts-Nevis',
                'St Lucia' => 'St Lucia',
                'St Maarten' => 'St Maarten',
                'St Pierre & Miquelon' => 'St Pierre & Miquelon',
                'St Vincent & Grenadines' => 'St Vincent & Grenadines',
                'Saipan' => 'Saipan',
                'Samoa' => 'Samoa',
                'Samoa American' => 'Samoa American',
                'San Marino' => 'San Marino',
                'Sao Tome & Principe' => 'Sao Tome & Principe',
                'Saudi Arabia' => 'Saudi Arabia',
                'Senegal' => 'Senegal',
                'Seychelles' => 'Seychelles',
                'Sierra Leone' => 'Sierra Leone',
                'Singapore' => 'Singapore',
                'Slovakia' => 'Slovakia',
                'Slovenia' => 'Slovenia',
                'Solomon Islands' => 'Solomon Islands',
                'Somalia' => 'Somalia',
                'South Africa' => 'South Africa',
                'Spain' => 'Spain',
                'Sri Lanka' => 'Sri Lanka',
                'Sudan' => 'Sudan',
                'Suriname' => 'Suriname',
                'Swaziland' => 'Swaziland',
                'Sweden' => 'Sweden',
                'Switzerland' => 'Switzerland',
                'Syria' => 'Syria',
                'Tahiti' => 'Tahiti',
                'Taiwan' => 'Taiwan',
                'Tajikistan' => 'Tajikistan',
                'Tanzania' => 'Tanzania',
                'Thailand' => 'Thailand',
                'Togo' => 'Togo',
                'Tokelau' => 'Tokelau',
                'Tonga' => 'Tonga',
                'Trinidad & Tobago' => 'Trinidad & Tobago',
                'Tunisia' => 'Tunisia',
                'Turkey' => 'Turkey',
                'Turkmenistan' => 'Turkmenistan',
                'Turks & Caicos Is' => 'Turks & Caicos Is',
                'Tuvalu' => 'Tuvalu',
                'Uganda' => 'Uganda',
                'United Kingdom' => 'United Kingdom',
                'Ukraine' => 'Ukraine',
                'United Arab Erimates' => 'United Arab Emirates',
                'United States of America' => 'United States of America',
                'Uraguay' => 'Uruguay',
                'Uzbekistan' => 'Uzbekistan',
                'Vanuatu' => 'Vanuatu',
                'Vatican City State' => 'Vatican City State',
                'Venezuela' => 'Venezuela',
                'Vietnam' => 'Vietnam',
                'Virgin Islands (Brit)' => 'Virgin Islands (Brit)',
                'Virgin Islands (USA)' => 'Virgin Islands (USA)',
                'Wake Island' => 'Wake Island',
                'Wallis & Futana Is' => 'Wallis & Futana Is',
                'Yemen' => 'Yemen',
                'Zaire' => 'Zaire',
                'Zambia' => 'Zambia',
                'Zimbabwe' => 'Zimbabwe',
            ],
            'default' => 'United Kingdom',
        ]);

        $this->crud->addField([
            'name' => 'postal_code',
            'type' => 'text',
            'label' => 'Postal Code',
            'attributes' => [
                'placeholder' => 'Postal Code',
            ],
        ]);

        $this->crud->addField([
            'name' => 'lat',
            'type' => 'number',
            'label' => 'Latitude',
        ], 'update');

        $this->crud->addField([
            'name' => 'lng',
            'type' => 'number',
            'label' => 'Longitude',
        ], 'update');

        // add asterisk for fields that are required in LocalGroupRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
