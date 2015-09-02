<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Press Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the Fair Hub web app
    | Press Accreditation Section
    |
    */

    'register' => 'Registration',
    'contact' => [
        'head' => 'Contact information',
        'name' => 'Name',
        'surname' => 'Surname',
        'email' => 'Personal E-mail where the press pass and all Veronafiere press communications will be sent',
        'cardnr' => 'Union of Journalists card nr.',
        'mobile' => 'Mobile phone',
        'qualification' => 'Qualification ',
        'workfor' => 'Work for',
        'twitter' => 'Twitter Account',
        'other' => 'Other',
    ],
    'newspaper' => [
        'head' => 'Information about publication(s) represented',
        'name' => 'Publication represented',
        'address' => 'Street',
        'city' => 'City',
        'zip' => 'ZIP code',
        'nationality' => 'Nationality',
        'province' => 'Province',
        'schedule' => 'Publication schedule',
        'email' => 'Publisher\'s email',
        'phone' => 'Landline',
        'website' => 'Web Site',
        'first' => 'If you work for several publications, enter the address of the first one mentioned',
    ],
    'firsttime' => [
        'yes' => 'Yes',
        'no' => 'No',
        'head' => 'Is this the first time you will visit the event?',
    ],
    'upload' => [
        'head' => 'Upload the documents requested here in PDF, JPG or DOC format.<br>Total size of attachment must not exceed 3 megabytes (3Mb).',
        'file1' => [
            '20' => 'Order of the Journalist card',
            '23' => [
                '0' => 'Copy of the engagement letter from newspaper/radio/tv/website that you work with, signed by the director or chief publisher',
            ],
            '24' => [
                '1' => 'Copy of the engagement letter from newspaper you work for, signed by your director or your chief publisher',
                '0' => 'Copy of the engagement letter from broadcaster you work for, signed by your director or your chief publisher, specifyng transmission/program that where the service will be used',
            ],
            '33' => 'Copy of a document testifying to journalistic activity',
        ],
        'file2' => [
            '23' => 'Copy of registred newspaper/radio/tv imprint or indications about its administration',
            '24' => 'Copy of a valid personal identity document',
            '33' => 'Copy of a valid personal identity document',
        ],
        'file3' => [
            '23' => 'Copy of registred newspaper/radio/tv imprint or indications about its administration',
        ],
        'file4' => [
            '24' => 'Photoservice recently published testifiyng your photoreporter activity. To whom already partecipated to a past edition of the manifestation, the attached material must testify the occurred coverage',
        ],
        'file5' => [
            '23' => 'Copy of a recent article published in your signature on paper publications, or links to a service audio/video or an article published overn an online newspapers recorded that witnesses the actual journalistic activities conducted in the field relating to the event for which you are requiring accreditation. For those who have already participated in the previous edition of the event, the enclosed materials must witness the occurred coverage',
            '24' => 'AIRF membership card and/or Order of the journalist membership card',
            '33' => 'Copy of articles published with your signature in printed magazines dealing with the event',
        ],
        'analink' => [
            '23' => 'For bloggers who already attended the previous edition of the event, links to at least one post/article published on the blog about the event in question',
            '33' => [
                '1' => 'For bloggers who already attended the previous edition of the event, links to at least one post/article published on the blog about the event in question',
                '0' => 'Link to audio/video coverage or online articles dealing with the event',
            ],
        ],
    ],
    'communications' => [
        'head' => 'Your Communications',
    ],
    'privacy' => [
        'head' => 'Privacy Notification',
        'checkbox' => 'I agree to processing of my personal data in conformity with the standards of <a href=":url">privacy laws</a>.',
    ],
    'actions' => [
        'head' => 'Send accreditation request',
        'description' => 'A confirmation screen will notify the successful outcome of sending the accreditation request. Any errors in the form compilation procedure are highlighted in red.',
        'notice' => 'Before sending the request make sure you have filled in all the required fields (marked with asterisks)',
        'submit' => 'Send accreditation request for :fair_name',
        'reset' => 'Reset',
    ],

    'human' => [
        'head' => 'Human verification test',
        'question' => 'Write the result of :a + :b',
        'placeholder' => 'Results',
        'wrong' => 'Sorry, your answer is wrong. Please try again',
        'numeric' => 'Please enter only numbers in the human verification test answer',
        'required' => 'Please verify you are human by answering this simple math question',
    ],

    'select' => [
        'qualification' => 'Select a qualification',
        'workfor' => 'Please select an option',
        'nationality' => 'Select a country',
        'schedule' => 'Select a scheduling',
        'province' => 'Select a province',
    ],

    'emails' =>[
        'signature' => 'Kind regards<br>\nVeronafiere Press Office- :fair<br>\nTel.: +39 045 8298 242 - 285<br>\ne-mail:pressoffice@veronafiere.it',
        'thanks' => "Dear collegue,<br />\nWe received your kind press accreditation requestdito for :fair, scheduled in Verona from :from until :until.<br />\nAfter verification of the data entered, you will receive a response from the Press Service.",
        'subject' => "Press Accreditation - :fair",
    ],

    'errors' => [
        'isblogger' => 'For the qualifications and employer selected you have to upload :attribute',
    ],

    'messages' => [
        'success' => 'Your request was successfully saved, soon you will receive a confirmation e-mail.'
    ],
];