
<script>
$(function() {
if($('#sameaddress').is(':checked')){
$('#companyaddress1').prop('disabled',true);
$('#companyaddress2').prop('disabled',true);
$('#companycity').prop('disabled',true);
$('#companystate').prop('disabled',true);
$('#companycountry').prop('disabled',true);
$('#companyzip').prop('disabled',true);
}
else{
$('#companyaddress1').prop('disabled',false);
$('#companyaddress2').prop('disabled',false);
$('#companycity').prop('disabled',false);
$('#companystate').prop('disabled',false);
$('#companycountry').prop('disabled',false);
$('#companyzip').prop('disabled',false);
}

$('#sameaddress').click(function() {
if($('#sameaddress').is(':checked')){
$('#companyaddress1').prop('disabled',true);
$('#companyaddress2').prop('disabled',true);
$('#companycity').prop('disabled',true);
$('#companystate').prop('disabled',true);
$('#companycountry').prop('disabled',true);

$('#companyzip').prop('disabled',true);
}
else{
$('#companyaddress1').prop('disabled',false);
$('#companyaddress2').prop('disabled',false);
$('#companycity').prop('disabled',false);
$('#companystate').prop('disabled',false);
$('#companycountry').prop('disabled',false);
$('#companyzip').prop('disabled',false);
}
}); 
    });
</script>

<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard']) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin' ]) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' => 'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>

<div class=topmargin></div>
<div class="users form">
<?= $this->Flash->render('auth') ?>
<legend><?= __("<h5 style='color:#15848F'>Edit Profile</h5>") ?></legend>  
<?= $this->Form->create() ?>
    <fieldset>    	
        <legend><?= __('<b>Note:</b> <font color=red>*</font> indicates required fields') ?></legend>
        <legend><?= __('Personal Information') ?></legend>
        <?= $this->Form->input('fname', ['type' => 'text','label'=>'First Name','required' => true,'value'=>h($results->First_Name)]); ?>
        <?= $this->Form->input('mname', ['type' => 'text','label'=>'Middle Initial','value'=>h($results->Middle_Initial)]); ?>
        <?= $this->Form->input('lname', ['type' => 'text','label'=>'Last Name','required' => true,'value'=>h($results->Last_Name)]); ?>
        <?= $this->Form->input('email', ['type' => 'email','label'=>'Email','required' => true,'value'=>h($results->Email_Address)]); ?>
        <?= $this->Form->input('alternateemail', ['type' => 'email','label'=>'Alternate Email','value'=>h($results->Alternate_Email_Address)]); ?>
        <?= $this->Form->input('homephone', ['type' => 'tel','label'=>'Primary Phone','required' => true,'value'=>h($results->Home_Phone)]); ?>
        <?= $this->Form->input('mobilephone', ['type' => 'tel','label'=>'Mobile Phone','value'=>h($results->Mobile_Phone)]); ?>

        <legend><?= __('Primary (Preferred) Contact Information') ?></legend>
        <?= $this->Form->input('address1', ['type' => 'text','label'=>'Street Address Line 1','required'=>	true,'value'=>h($results->Address1)]); ?>
        <?= $this->Form->input('address2', ['type' => 'text','label'=>'Street Address Line 2','value'=>h($results->Address2)]); ?>
        <?= $this->Form->input('city', ['type' => 'text','label'=>'City','required'=>	true,'value'=>h($results->City)]); ?>
        <?= $this->Form->input('state', array('type' => 'select','empty'=>' ','label'=>'State','required'=>	true,'value'=>h($results->State),'options'=>['Non US'=>'Non US',
'Alabama'=>'Alabama',
'Alaska'=>'Alaska','Arizona'=>'Arizona','Arkansas'=>'Arkansas','California'=>'California','Colorado'=>'Colorado','Connecticut'=>'Connecticut','District of Columbia'=>'District of Columbia',
'Delaware'=>'Delaware','Florida'=>'Florida','Georgia'=>'Georgia','Hawaii'=>'Hawaii','Idaho'=>'Idaho','Illinois'=>'Illinois','Indiana'=>'Indiana','Iowa'=>'Iowa','Kansas'=>'Kansas','Kentucky'=>'Kentucky','Louisiana'=>'Louisiana','Maine'=>'Maine',
'Maryland'=>'Maryland','Massachusetts'=>'Massachusetts','Michigan'=>'Michigan','Minnesota'=>'Minnesota','Mississippi'=>'Mississippi','Missouri'=>'Missouri','Montana'=>'Montana','Nebraska'=>'Nebraska',
'Nevada'=>'Nevada','New Hampshire'=>'New Hampshire','New Jersey'=>'New Jersey'])); ?>
        <?= $this->Form->input('zip', ['type' => 'text','label'=>'Postal Code','required'=>	true,'value'=>h($results->Postal_Code)]); ?>
        <?= $this->Form->input('country', array('type' => 'select','empty'=>' ','label'=>'Country','required'=>true,'value'=>h($results->Country),'options'=>[   
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

<?= $this->Form->input('purpose', array('type' => 'select','empty'=>' ','label'=>'Purpose for enrollment','required'=>true,'value'=>h($results->studentInfo['Purpose_For_Enrollment']),'options'=>[ 'Professional Development'=>'Professional Development','Job Requirement'=>'Job Requirement','Obtain CEP designation'=>'Obtain CEP designation',
       'Other'=>'Other'])); ?>
   <?= $this->Form->input('referer', array('type' => 'select','empty'=>' ','label'=>'How were you referred to the CEPI?','required'=>true,'value'=>h($results->studentInfo['Referred_By']),'options'=>[
        'NASPP'=>'NASPP','GEO'=>'GEO','NCEO'=>'NCEO','World at Work'=>'World at Work','E*Trade'=>'E*Trade','Transcentive'=>'Transcentive','Employer'=>'Employer','Colleague'=>'Colleague','Other'=>'Other'])); ?>
   
   <?= $this->Form->input('education', array('type' => 'select','empty'=>' ','label'=>'Highest education level','required'=>true,'value'=>h($results->studentInfo['Highest_Education_Level']),'options'=>[     
     'High School'=>'High School','Associates Degree'=>'Associates Degree','Bachelors Degree'=>'Bachelors Degree','Masters'=>'Masters','MBA'=>'MBA','Doctorate'=>'Doctorate','JD'=>'JD'])); ?>   
 <legend><?= __('Organizations to which you belong') ?></legend>
 
 <?= $this->Form->input('memberoforgs',array('label'=>'','type'=>'select', 'multiple'=>'checkbox','value'=>h($memberOfOrgs),
           'options'=>array(
           'NASPP'=>'NASPP', 
           'GEO'=>'GEO',
           'NCEO'=>'NCEO',
           'ACA'=>'ACA',
           'APA'=>'APA', 
           'FEI'=>'FEI',
           'ASCS'=>'ASCS',
           'NPA'=>'NPA',
           'Other'=>'Other'           

           ))); ?>

   <legend><?= __('E-Mail Opt Out:') ?></legend>   
	<?= $this->Form->radio('emailoptout', array('Yes'=>'Yes','No'=>'No'), array('value' =>h($results->Do_Not_Mail) ));?>
    </fieldset>
	<?= $this->Form->button(('Submit'),array('name' => 'ok')); ?>
	<?= $this->Form->button(('Back'),array('name' => 'cancel')); ?>

<?= $this->Form->end() ?>
</div>


