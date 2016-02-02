
<script>
$(function() {



if($('#sameaddress').is(':checked')){
$('#companyaddress1').prop('disabled',true);
$('#companyaddress2').prop('disabled',true);
$('#companycity').prop('disabled',true);
$('#companystate').prop('disabled',true);
$('#companycountry').prop('disabled',true);
$('#companyzip').prop('disabled',true);
$('#companyphone').prop('disabled',true);
$('#extension').prop('disabled',true);
$('#fax').prop('disabled',true);


}
else{
$('#companyaddress1').prop('disabled',false);
$('#companyaddress2').prop('disabled',false);
$('#companycity').prop('disabled',false);
$('#companystate').prop('disabled',false);
$('#companycountry').prop('disabled',false);
$('#companyzip').prop('disabled',false);
$('#companyphone').prop('disabled',false);
$('#extension').prop('disabled',false);
$('#fax').prop('disabled',false);


}

$('#sameaddress').click(function() {
if($('#sameaddress').is(':checked')){
$('#companyaddress1').prop('disabled',true);
$('#companyaddress2').prop('disabled',true);
$('#companycity').prop('disabled',true);
$('#companystate').prop('disabled',true);
$('#companycountry').prop('disabled',true);
$('#companyzip').prop('disabled',true);
$('#companyphone').prop('disabled',true);
$('#extension').prop('disabled',true);
$('#fax').prop('disabled',true);

}
else{
$('#companyaddress1').prop('disabled',false);
$('#companyaddress2').prop('disabled',false);
$('#companycity').prop('disabled',false);
$('#companystate').prop('disabled',false);
$('#companycountry').prop('disabled',false);
$('#companyzip').prop('disabled',false);
$('#companyphone').prop('disabled',false);
$('#extension').prop('disabled',false);
$('#fax').prop('disabled',false);
}
}); 
    });
</script>
<div class=topmargin></div>
<div class="users form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('<b>Note:</b> <font color=red>*</font> indicates required fields') ?></legend>
        <legend><?= __('Personal Information') ?></legend>
        <?= $this->Form->input('fname', ['type' => 'text','label'=>'First Name','required' => true]); ?>
        <?= $this->Form->input('mname', ['type' => 'text','label'=>'Middle Initial']); ?>
        <?= $this->Form->input('lname', ['type' => 'text','label'=>'Last Name','required' => true]); ?>
        <?= $this->Form->input('email', ['type' => 'email','label'=>'Email','required' => true]); ?>
        <?= $this->Form->input('alternateemail', ['type' => 'email','label'=>'Alternate Email']); ?>
        <?= $this->Form->input('homephone', ['type' => 'tel','label'=>'Primary Phone','required' => true]); ?>
        <?= $this->Form->input('mobilephone', ['type' => 'tel','label'=>'Mobile Phone']); ?>
        <?= $this->Form->input('password',['type' => 'password','required' => true,'label'=>'Password(At least 8 characters)']) ?>
        <?= $this->Form->input('passconfirm',['type' => 'password','required' => true,'label'=>'Confirm Password']) ?>
    
        <legend><?= __('Career Information') ?></legend>
        <?= $this->Form->input('company', ['type' => 'text','label'=>'Company']); ?>
        <?= $this->Form->input('title', ['type' => 'text','label'=>'Job Title']); ?>
        <?= $this->Form->input('department',array('type'=>'select','empty'=>' ','label'=>'Department','options'=>['Accounting'=>'Accounting','Comp and Benefits'=>'Comp and Benefits','Finance'=>'Finance','Human Resources'=>'Human Resources','Legal'=>'Legal','Payroll'=>'Payroll','Shareholder Services'=>'Shareholder Services','Stock Transfer'=>'Stock Transfer','Tax'=>'Tax'])); ?>        
        <?= $this->Form->input('companytype',array('type'=>'select','empty'=>' ','label'=>'Company Type','options'=>['Issuer'=>'Issuer','Outsourcing Firm'=>'Outsourcing Firm','Other Service Provider'=>'Other Service Provider'])); ?>
        
        <legend><?= __('Primary (Preferred) Contact Information') ?></legend>
        <?= $this->Form->input('address1', ['type' => 'text','label'=>'Street Address Line 1','required'=>	true]); ?>
        <?= $this->Form->input('address2', ['type' => 'text','label'=>'Street Address Line 2']); ?>
        <?= $this->Form->input('city', ['type' => 'text','label'=>'City','required'=>	true]); ?>
        <?= $this->Form->input('state', array('type' => 'select','empty'=>' ','label'=>'State','required'=>	true,'options'=>['Non US'=>'Non US',
'Alabama'=>'Alabama',
'Alaska'=>'Alaska','Arizona'=>'Arizona','Arkansas'=>'Arkansas','California'=>'California','Colorado'=>'Colorado','Connecticut'=>'Connecticut','District of Columbia'=>'District of Columbia',
'Delaware'=>'Delaware','Florida'=>'Florida','Georgia'=>'Georgia','Hawaii'=>'Hawaii','Idaho'=>'Idaho','Illinois'=>'Illinois','Indiana'=>'Indiana','Iowa'=>'Iowa','Kansas'=>'Kansas','Kentucky'=>'Kentucky','Louisiana'=>'Louisiana','Maine'=>'Maine',
'Maryland'=>'Maryland','Massachusetts'=>'Massachusetts','Michigan'=>'Michigan','Minnesota'=>'Minnesota','Mississippi'=>'Mississippi','Missouri'=>'Missouri','Montana'=>'Montana','Nebraska'=>'Nebraska',
'Nevada'=>'Nevada','New Hampshire'=>'New Hampshire','New Jersey'=>'New Jersey'])); ?>
        <?= $this->Form->input('zip', ['type' => 'text','label'=>'Postal Code','required'=>	true]); ?>
        <?= $this->Form->input('country', array('type' => 'select','empty'=>' ','label'=>'Country','required'=>true,'options'=>[   
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


<?= $this->Form->input('purpose', array('type' => 'select','empty'=>' ','label'=>'Purpose for enrollment','required'=>true,'options'=>[ 'Professional Development'=>'Professional Development','Job Requirement'=>'Job Requirement','Obtain CEP designation'=>'Obtain CEP designation',
       'Other'=>'Other'])); ?>
   <?= $this->Form->input('referer', array('type' => 'select','empty'=>' ','label'=>'How were you referred to the CEPI?','required'=>true,'options'=>[
        'NASPP'=>'NASPP','GEO'=>'GEO','NCEO'=>'NCEO','World at Work'=>'World at Work','E*Trade'=>'E*Trade','Transcentive'=>'Transcentive','Employer'=>'Employer','Colleague'=>'Colleague','Other'=>'Other'])); ?>
   
   <?= $this->Form->input('education', array('type' => 'select','empty'=>' ','label'=>'Highest education level','required'=>true,'options'=>[     
     'High School'=>'High School','Associates Degree'=>'Associates Degree','Bachelors Degree'=>'Bachelors Degree','Masters'=>'Masters','MBA'=>'MBA','Doctorate'=>'Doctorate','JD'=>'JD'])); ?>   
 <legend><?= __('Organizations to which you belong') ?></legend> 
 <?= $this->Form->input('memberoforgs',array('label'=>'','type'=>'select', 'multiple'=>'checkbox',

           'options'=>array('NASPP'=>'NASPP', 'GEO'=>'GEO',

           'NCEO'=>'NCEO','ACA'=>'ACA',

           'APA'=>'APA', 'FEI'=>'FEI',

           'ASCS'=>'ASCS', 'NPA'=>'NPA',

           'Other'=>'Other'           

           ))); ?>
         
<legend><?= __('Work Information') ?></legend>      
    <?= $this->Form->input('sameaddress', array('type' => 'checkbox','label'=>'Check if address is same as above')); ?>       
      <?= $this->Form->input('companyaddress1', ['type' => 'text','label'=>'Work Street Address Line 1']); ?>
      <?= $this->Form->input('companyaddress2', ['type' => 'text','label'=>'Work Street Address Line 2']); ?>
      <?= $this->Form->input('companycity', ['type' => 'text','label'=>'City']); ?>
      <?= $this->Form->input('companystate', array('type' => 'select','empty'=>' ','label'=>'State','options'=>['Non US'=>'Non US',
'Alabama'=>'Alabama',
'Alaska'=>'Alaska','Arizona'=>'Arizona','Arkansas'=>'Arkansas','California'=>'California','Colorado'=>'Colorado','Connecticut'=>'Connecticut','District of Columbia'=>'District of Columbia',
'Delaware'=>'Delaware','Florida'=>'Florida','Georgia'=>'Georgia','Hawaii'=>'Hawaii','Idaho'=>'Idaho','Illinois'=>'Illinois','Indiana'=>'Indiana','Iowa'=>'Iowa','Kansas'=>'Kansas','Kentucky'=>'Kentucky','Louisiana'=>'Louisiana','Maine'=>'Maine',
'Maryland'=>'Maryland','Massachusetts'=>'Massachusetts','Michigan'=>'Michigan','Minnesota'=>'Minnesota','Mississippi'=>'Mississippi','Missouri'=>'Missouri','Montana'=>'Montana','Nebraska'=>'Nebraska',
'Nevada'=>'Nevada','New Hampshire'=>'New Hampshire','New Jersey'=>'New Jersey'])); ?>
      <?= $this->Form->input('companyzip', ['type' => 'text','label'=>'Postal Code']); ?>
        
<?= $this->Form->input('companycountry', array('type' => 'select','empty'=>' ','label'=>'Country','options'=>[ 
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
'Yemen'=>'Yemen','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe','Other'=>'Other'])); ?>
       <?= $this->Form->input('companyphone', ['type' => 'tel','label'=>'Phone']); ?>
      <?= $this->Form->input('extension', ['type' => 'text','label'=>'Ext']); ?>
      <?= $this->Form->input('fax', ['type' => 'tel','label'=>'Fax']); ?> 
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->unlockField('companyaddress1'); ?>
    <?= $this->Form->unlockField('companyaddress2'); ?>
    <?= $this->Form->unlockField('companycity'); ?>
    <?= $this->Form->unlockField('companystate'); ?>
    <?= $this->Form->unlockField('companyzip'); ?>
    <?= $this->Form->unlockField('companycountry'); ?>
    <?= $this->Form->unlockField('companyphone'); ?>
    <?= $this->Form->unlockField('extension'); ?>
    <?= $this->Form->unlockField('fax'); ?>
<?= $this->Form->end() ?>
</div>


