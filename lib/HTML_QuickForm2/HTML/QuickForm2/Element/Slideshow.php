<?php
/**
 * Class for static elements that only contain text or markup
 *
 * PHP version 5
 *
 * LICENSE:
 *
 * Copyright (c) 2013, Dinh Hung <dinhhungvn@gmail.com>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *    * Redistributions of source code must retain the above copyright
 *      notice, this list of conditions and the following disclaimer.
 *    * Redistributions in binary form must reproduce the above copyright
 *      notice, this list of conditions and the following disclaimer in the
 *      documentation and/or other materials provided with the distribution.
 *    * The names of the authors may not be used to endorse or promote products
 *      derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
 * IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
 * OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category HTML
 * @package  InputImagePopup
 * @author   Dinh Hung <dinhhungvn@gmail.com>
 * @license  http://opensource.org/licenses/bsd-license.php New BSD License
 * @version  SVN: $Id: Static.php 323363 2012-02-19 15:09:07Z avb $
 * @link     http://pear.php.net/package/HTML_QuickForm2
 */

/**
 * Base class for simple HTML_QuickForm2 elements (not Containers)
 */
require_once 'HTML/QuickForm2/Element.php';

/**
 * Class for static elements that only contain text or markup
 *
 * @category HTML
 * @package  HTML_QuickForm2
 * @author   Alexey Borzov <avb@php.net>
 * @author   Bertrand Mansion <golgote@mamasam.com>
 * @license  http://opensource.org/licenses/bsd-license.php New BSD License
 * @version  Release: 2.0.0
 * @link     http://pear.php.net/package/HTML_QuickForm2
 */
class HTML_QuickForm2_Element_Slideshow extends HTML_QuickForm2_Element
{
   /**
    * 'type' attribute should not be changeable
    * @var array
    */
    protected $watchedAttributes = array('id', 'name', 'type');

    protected function onAttributeChange($name, $value = null)
    {
        if ('type' == $name) {
            throw new HTML_QuickForm2_InvalidArgumentException(
                "Attribute 'type' is read-only"
            );
        }
        parent::onAttributeChange($name, $value);
    }

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function setValue($value)
    {
        $this->setAttribute('value', (string)$value);
        return $this;
    }

    public function getRawValue()
    {
        return $this->getAttribute('disabled')? null: $this->getAttribute('value');
    }

    public function __toString()
    {
        if ($this->frozen) {
            return $this->getFrozenHtml();
        } else {
			$stringIMG = array(0);
			$string_src="data:image/gif;base64,R0lGODdhyACWAOMAAO/v76qqqubm5t3d3bu7u7KystXV1cPDw8zMzAAAAAAAAAAAAAAAAAAAAAAAAAAAACwAAAAAyACWAAAE/hDISau9OOvNu/9gKI5kaZ5oqq5s675wLM90bd94ru987//AoHBILBqPyKRyyWw6n9CodEqtWq/YrHbL7Xq/4LB4TC6bz+i0es1uu9/wuHxOr9vv+Lx+z+/7/4CBgoOEhYaHiImKi4yNjo+QkZKTlJWWl5iZmpucnZ6foKGio6SlpqeoqaqrrK2ur7CxsrO0tba3TAMFBQO4LAUBAQW+K8DCxCoGu73IzSUCwQECAwQBBAIVCMAFCBrRxwDQwQLKvOHV1xbUwQfYEwIHwO3BBBTawu2BA9HGwcMT1b7Vw/Dt3z563xAIrHCQnzsAAf0F6ybhwDdwgAx8OxDQgASN/sKUBWNmwQDIfwBAThRoMYDHCRYJGAhI8eRMf+4OFrgZgCKgaB4PHqg4EoBQbxgBROtlrJu4ofYm0JMQkJk/mOMkTA10Vas1CcakJrXQ1eu/sF4HWhB3NphYlNsmxOWKsWtZtASTdsVb1mhEu3UDX3RLFyVguITzolQKji/GhgXNvhU7OICgsoflJr7Qd2/isgEPGGAruTTjnSZTXw7c1rJpznobf2Y9GYBjxIsJYQbXstfRDJ1luz6t2TDvosSJSpMw4GXG3TtT+hPpEoPJ6R89B7AaUrnolgWwnUQQEKVOAy199mlonPDfr3m/GeUHFjBhAf0SUh28+P12QOIIgDbcPdwgJV+Arf0jnwTwsHOQT/Hs1BcABObjDAcTXhiCOGppKAJI6nnIwQGiKZSViB2YqB+KHtxjjXMsxijjjDTWaOONOOao44489ujjj0AGKeSQRBZp5JFIJqnkkkw26eSTUEYp5ZRUVmnllVhmqeWWXHbp5ZdghinmmGSW6UsEADs=";
			if($this->attributes['value']!=""){
				$stringIMG = json_decode($this->attributes['value']);
				$strshow = "";
				$new= true;
			}
			else{
				$strshow = "display:none";
				$new=false;
			}
			$string='<div class="row-fluid" id="'.$this->attributes['name'].'">';
			$string.='<div class="scroller" style="height:400px">';
			foreach($stringIMG as $k=> $src){
				$image_src = ($new)?$src:$string_src;
				$input_val = ($new)?$src:"";
				
			$string .= '<div class="gitem pull-left"><div class="portlet box grey" id="img-'.$this->attributes['name'].'-'.$k.'">
			 <div class="portlet-title">
			 <div class="caption">
			 <i class="icon-reorder"></i>Ảnh '.($k+1).'</div>
     <div class="actions">
<button type="button"  class="btn mini red" onclick="BrowseServer( \''.$this->attributes["data-folder"].':/\', \''.$this->attributes["name"].'-'.$k.'\' );" />	
Chọn <i class="icon-plus"></i></button>		
<a href="javascript:" style="'.$strshow.'" onclick="return removeThumb(\''.$this->attributes["name"].'-'.$k.'\')" class="btn mini red removepic" data-dismiss="fileupload">Xóa <i class="icon-remove"></i></a>
<button type="button" class="btn mini blue" onclick="return Slideshow.removebox(\''.$this->attributes["name"].'-'.$k.'\')" data-dismiss="fileupload"><i class="icon-trash"></i></button>
     </div>
			 
			 </div>
			 <div class="portlet-body">
<div class="fileupload fileupload-new" style="text-align:center" id="inner-'.$this->attributes["name"].'-'.$k.'" data-provides="fileupload">
<div class="fileupload-new thumbnail"  style="height:150px">
<img style="width:200px" src="'.$image_src.'" alt="" />
</div>
<div class="clearfix"></div>
</div>
	<input type="hidden" value="'.$input_val.'" class="span6 m-wrap medium" name="'.$this->attributes['name'].'[]" id="'.$this->attributes["name"].'-'.$k.'" />
	</div>	</div></div>	';
			}
	$string.='</div></div>';
	
	$string.='<div class="pull-left"><button type="button" onclick="return Slideshow.addmore(\''.$this->attributes['name'].'\')" class="btn red">Thêm ảnh </button></div>';
	return $string;
        }
    }

   /**
    * Returns the field's value without HTML tags
    * @return string
    */
    protected function getFrozenHtml()
    {
        $value = $this->getAttribute('value');
        return (('' != $value)? htmlspecialchars($value, ENT_QUOTES, self::getOption('charset')): '&nbsp;') .
               $this->getPersistentContent();
    }
}
?>