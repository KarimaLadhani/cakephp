<?php
namespace App\Model\Table;

use App\Model\Entity\PaymentCodeT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * PaymentCodeT Model
 */
class PaymentCodeTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('PAYMENT_CODE_T');
        $this->displayField('Payment_Code_ID');
        $this->primaryKey('Payment_Code_ID');
    }

    
    private function getPaymentCodeReference(){
    	return TableRegistry::get('PaymentCodeT');
    }   
    
    /**
     * This function will verify if the payment code is valid
     * @param unknown $paycode
     */
    public function verifyPaymentCode($paycode){
    	$paycodeReference=$this->getPaymentCodeReference();
    	$result=$paycodeReference->find()->where(['Payment_Code'=>$paycode,'Disable <>'=>'Yes']);
    	//debug($result);
    	return $result->first();   
    }
    
    /**
     * this function will fetch the payment code for 'Check' payment method
     */
    public function findCheckPaymentCode(){
    	$paycodeReference=$this->getPaymentCodeReference();
    	$result=$paycodeReference->find()->select(['Payment_Code_ID'])->where(['Payment_Code'=>'Check']);
    	return $result->first();
    }
    
    
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('Payment_Code_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Payment_Code_ID', 'create');
            
        $validator
            ->allowEmpty('Payment_Code');
            
        $validator
            ->allowEmpty('Disable');
            
        $validator
            ->add('Date_Disabled', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Disabled');
            
        $validator
            ->allowEmpty('Payment_Company');
            
        $validator
            ->allowEmpty('Send_Invoice_To');
            
        $validator
            ->add('Date_Paid', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Paid');
            
        $validator
            ->add('Amount_Paid', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Amount_Paid');
            
        $validator
            ->allowEmpty('Check_Number');
            
        $validator
            ->allowEmpty('Note');
            
        $validator
            ->allowEmpty('Invoice_Number');

        return $validator;
    }
}
