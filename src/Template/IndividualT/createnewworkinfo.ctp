<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard','controller'=>'IndividualT']) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin', 'controller'=>'IndividualT' ]) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile', 'controller'=>'IndividualT']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' => 'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam','controller'=>'IndividualT']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory','controller'=>'IndividualT']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>

<div class="large-10 medium-9 columns">	             
    <?= $this->Form->create('createnewworkinfo') ?>
    <fieldset>    	        
        <legend><?= __('Create Work Information') ?></legend>
        <?= $this->Form->input('company', ['type' => 'text','label'=>'Company','required'=>true]); ?>
        <?= $this->Form->input('title', ['type' => 'text','label'=>'Title','required'=>true]); ?>
        <?= $this->Form->input('department',array('type'=>'select','required'=>true,'empty'=>true,'label'=>'Department','options'=>['Accounting'=>'Accounting','Comp and Benefits'=>'Comp and Benefits','Finance'=>'Finance','Human Resources'=>'Human Resources','Legal'=>'Legal','Payroll'=>'Payroll','Shareholder Services'=>'Shareholder Services','Stock Transfer'=>'Stock Transfer','Tax'=>'Tax'])); ?>        
        
        <?= $this->Form->input('workaddress1', ['type' => 'text','label'=>'Work Address Line 1','required'=>true]); ?>
        <?= $this->Form->input('workaddress2', ['type' => 'text','label'=>'Work Address Line 2']); ?>
        <?= $this->Form->input('workcity', ['type' => 'text','label'=>'Work City','required'=>true]); ?>
             <?= $this->Form->input('workstate', array('type' => 'select','label'=>'Work State','required'=>true,'empty'=>true,'options'=>['Non US'=>'Non US',
'Alabama'=>'Alabama',
'Alaska'=>'Alaska','Arizona'=>'Arizona','Arkansas'=>'Arkansas','California'=>'California','Colorado'=>'Colorado','Connecticut'=>'Connecticut','District of Columbia'=>'District of Columbia',
'Delaware'=>'Delaware','Florida'=>'Florida','Georgia'=>'Georgia','Hawaii'=>'Hawaii','Idaho'=>'Idaho','Illinois'=>'Illinois','Indiana'=>'Indiana','Iowa'=>'Iowa','Kansas'=>'Kansas','Kentucky'=>'Kentucky','Louisiana'=>'Louisiana','Maine'=>'Maine',
'Maryland'=>'Maryland','Massachusetts'=>'Massachusetts','Michigan'=>'Michigan','Minnesota'=>'Minnesota','Mississippi'=>'Mississippi','Missouri'=>'Missouri','Montana'=>'Montana','Nebraska'=>'Nebraska',
'Nevada'=>'Nevada','New Hampshire'=>'New Hampshire','New Jersey'=>'New Jersey'])); ?>
        <?= $this->Form->input('workpostcode', ['type' => 'text','label'=>'Work Zip Code']); ?>
		
        <?= $this->Form->input('workcountry', array('type' => 'select','empty'=>true,'label'=>'Work Country','required'=>true,'options'=>[   
'United States'=>'United States',
'Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica',
'Antigua and Barbuda'=>'Antigua and Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize',
'Benin'=>'Benin','Bermuda'=>'Bermuda','Bermuda'=>'Bhutan','Bermuda'=>'Bolivia','Bosnia and Herzegovina'=>'Bosnia and Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei Darussalam'=>'Brunei Darussalam','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia',
'Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Colombia'=>'Colombia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote Divoire'=>'Cote Divoire','Croatia'=>'Croatia','Cuba'=>'Cuba','Cyprus'=>'Cyprus',
'Czech Republic'=>'Czech Republic','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia',
'Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','French Guiana'=>'French Guiana','French Polynesia'=>'French Polynesia','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia',
'Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-bissau'=>'Guinea-bissau','Guyana'=>'Guyana','Haiti'=>'Haiti',
'Holy See (Vatican City State)'=>'Holy See (Vatican City State)','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran, Islamic Republic of'=>'Iran, Islamic Republic of','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel',
'Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Lao Peoples Democratic Republic'=>'Lao Peoples Democratic Republic','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho',
'Liberia'=>'Liberia','Libyan Arab Jamahiriya'=>'Libyan Arab Jamahiriya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macao'=>'Macao','Macedonia, The Former Yugoslav Republic of'=>'Macedonia, The Former Yugoslav Republic of','Madagascar'=>'Madagascar',
'Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte',
'Mexico'=>'Mexico','Micronesia, Federated States of'=>'Micronesia, Federated States of','Moldova, Republic of'=>'Moldova, Republic of','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar'=>'Myanmar','Namibia'=>'Namibia',
'Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','Northern Mariana Islands'=>'Northern Mariana Islands','Korea, Democratic Peoples Republic of'=>'Korea, Democratic Peoples Republic of','Norway'=>'Norway',
'Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Palestinian Territory, Occupied'=>'Palestinian Territory, Occupied','Panama'=>'Panama',
'Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal',
'Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russian Federation'=>'Russian Federation','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts and Nevis'=>'Saint Kitts and Nevis','Saint Lucia'=>'Saint Lucia','Samoa'=>'Samoa','San Marino'=>'San Marino',
'Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Serbia and Montenegro'=>'Serbia and Montenegro','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovakia'=>'Slovakia','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','Korea, Republic of'=>'Korea, Republic of','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka',
'Sudan'=>'Sudan','Suriname'=>'Suriname','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syrian Arab Republic'=>'Syrian Arab Republic','Taiwan, Province of China'=>'Taiwan, Province of China','Tajikistan'=>'Tajikistan','Tanzania, United Republic of'=>'Tanzania, United Republic of','Thailand'=>'Thailand',
'Timor-leste'=>'Timor-leste','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad and Tobago'=>'Trinidad and Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates',
'United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Venezuela'=>'Venezuela','Viet Nam'=>'Viet Nam','Virgin Islands, British'=>'Virgin Islands, British','Virgin Islands, U.S.'=>'Virgin Islands, U.S.','Wallis and Futuna'=>'Wallis and Futuna','Western Sahara'=>'Western Sahara',
'Yemen'=>'Yemen','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe','Other'=>'Other'

])); ?>
        <?= $this->Form->input('workphone', ['type' => 'tel','label'=>'Work Phone']); ?>
                      
      </fieldset>
     <?= $this->Form->button(('Submit'),array('name' => 'ok')); ?>

    <?= $this->Form->end() ?>
</div>

    
    