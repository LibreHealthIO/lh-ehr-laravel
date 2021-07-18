<?php

/*
|--------------------------------------------------------------------------
| Patient Socila Statistics Factory
|--------------------------------------------------------------------------
|
| Use this to generate fake data for patient_social_statistics table.
| @author Priyanshu Sinha <pksinha217@gmail.com>
| @author Mua N. Laurent <muarachmann@gmail.com>
*/


namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use App\Models\Patients\PatientSocialStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientSocialStatisticFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientSocialStatistic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $ethnicity = ['Decline to specify', 'Hispanic or Latino', 'Not hispanic or Latino'];

        $migrantSeasonal = ['migrant', 'seasonal'];

        $homeless = [true, false];

        $language = ['English', 'Afar', 'Abkhazian', 'Afrikaans' , 'Amharic' , 'Arabic' , 'Assamese' ,
            'Aymara' , 'Azerbaijani' ,'Bashkir' , 'Byelorussian' , 'Bulgarian' , 'Bihari' , 'Bislama' ,
            'Bengali/Bangla' , 'Tibetan' , 'Breton' , 'Catalan' , 'Corsican' , 'Czech' , 'Welsh' , 'Danish' ,
            'German' , 'Bhutani' , 'Greek' , 'Esperanto' , 'Spanish' , 'Estonian' , 'Basque' , 'Persian' , 'Finnish' ,
            'Fiji' , 'Faeroese' , 'French' , 'Frisian' , 'Irish' , 'Scots/Gaelic' , 'Galician' , 'Guarani' ,
            'Gujarati' , 'Hausa' , 'Hindi' , 'Croatian' , 'Hungarian' , 'Armenian' , 'Interlingua' , 'Interlingue' ,
            'Inupiak' , 'Indonesian' , 'Icelandic' , 'Italian' , 'Hebrew' , 'Japanese' , 'Yiddish' , 'Javanese' ,
            'Georgian' , 'Kazakh' , 'Greenlandic' , 'Cambodian' , 'Kannada' , 'Korean' , 'Kashmiri' , 'Kurdish' ,
            'Kirghiz' , 'Latin' , 'Lingala' , 'Laothian' , 'Lithuanian' , 'Latvian/Lettish' , 'Malagasy' , 'Maori' ,
            'Macedonian' , 'Malayalam' , 'Mongolian' , 'Moldavian' , 'Marathi' , 'Malay' , 'Maltese' , 'Burmese' ,
            'Nauru' , 'Nepali' , 'Dutch' , 'Norwegian' , 'Occitan' , '(Afan)/Oromoor/Oriya' , 'Punjabi' , 'Polish' ,
            'Pashto/Pushto' , 'Portuguese' , 'Quechua' , 'Rhaeto-Romance' , 'Kirundi' , 'Romanian' , 'Russian' ,
            'Kinyarwanda' , 'Sanskrit' , 'Sindhi' , 'Sangro' , 'Serbo-Croatian' , 'Singhalese' , 'Slovak' ,
            'Slovenian' , 'Samoan' , 'Shona' , 'Somali' , 'Albanian' , 'Serbian' , 'Siswati' , 'Sesotho' ,
            'Sundanese' , 'Swedish' , 'Swahili' , 'Tamil' , 'Tegulu' , 'Tajik' , 'Thai' , 'Tigrinya' , 'Turkmen' ,
            'Tagalog' , 'Setswana' , 'Tonga' , 'Turkish' , 'Tsonga' , 'Tatar' , 'Twi' , 'Ukrainian' , 'Urdu' ,
            'Uzbek' , 'Vietnamese' , 'Volapuk' , 'Wolof' , 'Xhosa' , 'Yoruba' , 'Chinese' , 'Zulu'];

        $patient_ids = Patient::all()->pluck('id')->toArray();

        $religions = ['Adventist', 'African Religions', 'Afro-Caribbean Religions', 'Agnosticism', 'Anglican',
            'Animism', 'Assembly of God', 'Atheism', "Babi & Baha'I faiths", 'Baptist', 'Bon', 'Brethren',
            'Cao Dai', 'Celticism', 'Christian (non-Catholic, non-specific)', 'Christian Scientist',
            'Church of Christ', 'Church of God', 'Confucianism', 'Congregational', 'Cyberculture Religions',
            'Disciples of Christ', 'Divination', 'Eastern Orthodox', 'Episcopalian', 'Evangelical Covenant',
            'Fourth Way', 'Free Daism', 'Friends', 'Full Gospel', 'Gnosis', 'Hinduism', 'Humanism', 'Independent',
            'Islam', 'Jainism', "Jehovah's Witnesses", 'Judaism', 'Latter Day Saints', 'Lutheran', 'Mahayana',
            'Meditation', 'Messianic Judaism', 'Methodist', 'Mitraism', 'Native American', 'Nazarene', 'New Age',
            'non-Roman Catholic', 'Occult', 'Orthodox', 'Paganism', 'Pentecostal', 'Presbyterian', 'Process, The',
            'Protestant', 'Protestant, No Denomination', 'Reformed', 'Reformed/Presbyterian', 'Roman Catholic Church',
            'Salvation Army', 'Satanism', 'Scientology', 'Shamanism', 'Shiite (Islam)', 'Shinto', 'Sikism',
            'Spiritualism', 'Sunni (Islam)', 'Taoism', 'Theravada', 'Unitarian Universalist', 'Unitarian-Universalism',
            'United Church of Christ', 'Universal Life Church', 'Vajrayana (Tibetan)', 'Veda', 'Voodoo', 'Wicca',
            'Yaohushua', 'Zen Buddhism', 'Zoroastrianism'];

        return [
            'patient_id' => $this->faker->randomElement($patient_ids),
            'ethnicity' => $ethnicity[array_rand($ethnicity, 1)],
            'religion' => $religions[array_rand($religions, 1)],
            'interpreter' => Str::random(10),
            'migrant_seasonal' => $migrantSeasonal[array_rand($migrantSeasonal, 1)],
            'family_size' => $this->faker->randomDigitNotNull,
            'monthly_income' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'homeless' => $homeless[array_rand($homeless, 1)],
            'financial_review' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'language' => $language[array_rand($language, 1)],
        ];
    }
}
