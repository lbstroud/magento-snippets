<?php

function eclipse2netbeans($eclipsePath, $netbeansPath)
{
    $eclipseXml  = new SimpleXMLElement($eclipsePath, null, true);
    $netbeansXml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE codetemplates PUBLIC "-//NetBeans//DTD Editor Code Templates settings 1.0//EN" "http://www.netbeans.org/dtds/EditorCodeTemplates-1_0.dtd"><codetemplates />');

    foreach ($eclipseXml->template as $eclipseTemplateXml)
    {
        $netbeansTemplateXml = $netbeans->addChild('codetemplate');
    
        $netbeansTemplate->addAttribute('abbreviation', (string)$eclipseTemplate['name']);
        $netbeansTemplate->addAttribute('xml:space', 'preserve');
        $code = $netbeansTemplate->addChild('code');
    
        $node = dom_import_simplexml($code);
        $doc  = $node->ownerDocument;
        $node->appendChild($doc->createCDATASection((string)$eclipseTemplate));
    
        $description = (string)$eclipseTemplate['description'];
    
        if ($description)
        {
            $descriptionXml = $netbeansTemplate->addChild('description');
            $node = dom_import_simplexml($descriptionXml);
            $node->appendChild($doc->createCDATASection($description));
        }
    }

    $netbeans->asXML($netbeansPath);
}

eclipse2netbeans(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'eclipse_xml_snippets.xml', dirname(__FILE__).'/package/config/Editors/text/xml/CodeTemplates/org-netbeans-modules-editor-settings-CustomCodeTemplates.xml');
eclipse2netbeans(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'eclipse_php_snippets.xml', dirname(__FILE__).'/package/config/Editors/text/x-php5/CodeTemplates/org-netbeans-modules-editor-settings-CustomCodeTemplates.xml');
