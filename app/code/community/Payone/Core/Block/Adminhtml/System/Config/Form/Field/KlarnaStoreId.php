<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License (GPL 3)
 * that is bundled with this package in the file LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Payone_Core to newer
 * versions in the future. If you wish to customize Payone_Core for your
 * needs please refer to http://www.payone.de for more information.
 *
 * @category        Payone
 * @package         Payone_Core_Block
 * @subpackage      Adminhtml_System
 * @copyright       Copyright (c) 2013 <info@noovias.com> - www.noovias.com
 * @author          Alexander Dite <info@noovias.com>
 * @license         <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link            http://www.noovias.com
 */

/**
 *
 * @category        Payone
 * @package         Payone_Core_Block
 * @subpackage      Adminhtml_System
 * @copyright       Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @license         <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link            http://www.noovias.com
 */

class Payone_Core_Block_Adminhtml_System_Config_Form_Field_KlarnaStoreId
    extends Payone_Core_Block_Adminhtml_System_Config_Form_Field_Abstract
{
    /**
     *
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'klarna_store_id', array(
            'label' => Mage::helper('payone_core')->__('Store-ID'),
            'style' => 'min-width:120px;',
            )
        );

        $this->addColumn(
            'countries', array(
            'label' => Mage::helper('payone_core')->__('Countries'),
            'style' => 'min-width:120px; min-height: 110px;',
            )
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('payone_core')->__('Add Store-ID');
        parent::_prepareToRender();
    }

    /**
     * @param string $columnName
     * @return string
     * @throws Exception
     */
    protected function _renderCellTemplate($columnName)
    {
        if ($columnName == 'countries')
        {
            $selectType = Payone_Core_Block_Adminhtml_System_Config_Form_Field_Abstract::PAYONE_CORE_FIELD_MULTISELECT;
            $modelConfigCode = $this->getFactory()->getModelSystemConfigKlarnaCountry();
            $options = $modelConfigCode->toOptionArray();
            $rendered = $this->prepareCellTemplate($columnName, $selectType, $options);
        }
        else {
            return parent::_renderCellTemplate($columnName);
        }

        return $rendered;
    }
}