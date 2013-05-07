<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet xmlns:mods="http://www.loc.gov/mods/v3" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" exclude-result-prefixes="mods" version="1.0">
<xsl:output indent="yes" method="html"/>

<xsl:template match="/">
  <xsl:choose>
    <xsl:when test="mods:modsCollection">
      <xsl:apply-templates select="mods:modsCollection/mods:mods"/>
    </xsl:when>
    <xsl:when test="mods:mods">
      <xsl:apply-templates select="mods:mods"/>
    </xsl:when>
  </xsl:choose>
</xsl:template>

<xsl:template match="mods:mods">
  <table class="modsContainer">
  <xsl:apply-templates/>
  </table>
  <!--hr/-->
</xsl:template>

<xsl:template match="mods:titleInfo/mods:title/text()">
  <tr>
    <td class="mods_label">Title</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_title_ms%3A%22{.}%22"><xsl:value-of select="."/></a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject/mods:hierarchicalGeographic/text()">
  <tr>
    <td class="mods_label">Site</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[@type='operation']/text()">
  <tr>
    <td class="mods_label">Operation</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_note_operation_ms%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[@type='subop']/text()">
  <tr>
    <td class="mods_label">Suboperation</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_note_subop_ms%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[@type='unit']/text()">
  <tr>
    <td class="mods_label">Unit</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_note_unit_ms%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[@type='level']/text()">
  <tr>
    <td class="mods_label">Level</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_note_level_ms%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[@type='lot']/text()">
  <tr>
    <td class="mods_label">Lot</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_note_lot_ms%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[@type='citation']/text()">
  <tr>
    <td class="mods_label">Citation</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject[not(mods:*)]/text()">
  <tr>
    <td class="mods_label">Subject/Keywords</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='creator']">
  <tr>
    <td class="mods_label">Creator</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='contributor']">
  <tr>
    <td class="mods_label">Contributor</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='photographer']">
  <tr>
    <td class="mods_label">Source</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:name/mods:namePart[../mods:role/mods:roleTerm/text()='department']">
  <tr>
    <td class="mods_label">Department</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:language/mods:languageTerm/text()">
  <tr>
    <td class="mods_label">Language<xsl:if test="@authority != ''"> (<xsl:value-of select="@authority"/>)</xsl:if>
</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='slide']/text()">
  <tr>
    <td class="mods_label">Slide</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='batch']/text()">
  <tr>
    <td class="mods_label">Batch</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='catalog']/text()">
  <tr>
    <td class="mods_label">Catalog</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_identifier_catalog_mt%3A%22{.}%22">
<xsl:value-of select="."/>
</a></td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='analysis']/text()">
  <tr>
    <td class="mods_label">Analysis</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='INAA']/text()">
  <tr>
    <td class="mods_label">INAA</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_identifier_INAA_mt%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='petrography']/text()">
  <tr>
    <td class="mods_label">Petrography</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:identifier[@type='vessel']/text()">
  <tr>
    <td class="mods_label">Vessel</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_identifier_vessel_mt%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:accessCondition/text()">
  <tr>
    <td class="mods_label">Rights</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:typeOfResource/text()">
  <tr>
    <td class="mods_label">Type of Resource</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:dateCreated/text()">
  <tr>
    <td class="mods_label">Date Created</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject/mods:temporal/text()">
  <tr>
    <td class="mods_label">Time Period</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject/mods:geographic/text()">
  <tr>
    <td class="mods_label">Geographic</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject[@displayLabel='']/mods:topic/text()">
  <tr>
    <td class="mods_label">Unit</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject[@displayLabel='architectural feature']/mods:topic/text()">
  <tr>
    <td class="mods_label">Architectural Feature</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject[@displayLabel='discovery']/mods:topic/text()">
  <tr>
    <td class="mods_label">Type of Discovery</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject[@displayLabel='culture keywords']/mods:topic/text()">
  <tr>
    <td class="mods_label">Cultural Keywords</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject[@displayLabel='environmental keywords']/mods:topic/text()">
  <tr>
    <td class="mods_label">Soil Type</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:note[not(@type)]/text()">
  <tr>
    <td class="mods_label">Note</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:abstract/text()">
  <tr>
    <td class="mods_label">Description</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:physicalDescription/mods:note/text()">
  <tr>
    <td class="mods_label">Physical Description</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:physicalDescription/mods:form[@type='material']/text()">
  <tr>
    <td class="mods_label">Ceramic Type</td>
    <td class="mods_value">
<a href="http://air-web2.williams.edu/mayamotuldesanjose/islandora/search/%20?f[0]=mods_physical_description_form_material_ms%3A%22{.}%22">
<xsl:value-of select="."/>
</a>
</td>
  </tr>
</xsl:template>

<xsl:template match="mods:location/mods:physicalLocation/text()">
  <tr>
    <td class="mods_label">Physical Location</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:location/mods:url/text()">
  <tr>
    <td class="mods_label">Url</td>
    <td class="mods_value"><xsl:value-of select="."/></td>
  </tr>
</xsl:template>

<xsl:template match="mods:subject/mods:cartographics/mods:coordinates">
  <tr>
    <td class="mods_label">Cartographics</td>
    <td class="mods_value">
      <table>
        <tr>
          <td class="mods_label">Suboperation Description</td>
          <td class="mods_value"><xsl:value-of select="../../mods:topic"/></td>
        </tr>
        <tr>
          <td class="mods_label">Coordinates</td>
          <td class="mods_value">
<a href="https://maps.google.com/maps?q={.}&amp;z=19" target="_new">
<xsl:value-of select="."/>
</a>
</td>
        </tr>
      </table>
    </td>
  </tr>
</xsl:template>

<xsl:template match="mods:originInfo">
  <tr>
    <td class="mods_label">Origin</td>
    <td class="mods_value">
      <table>
        <tr>
          <td class="mods_label">Date Captured</td>
          <td class="mods_value"><xsl:value-of select="mods:dateCaptured"/></td>
        </tr>
        <tr>
          <td class="mods_label">Publisher</td>
          <td class="mods_value"><xsl:value-of select="mods:publisher"/></td>
        </tr>
        <tr>
          <td class="mods_label">Place of Publication</td>
          <td class="mods_value"><xsl:value-of select="mods:place/mods:placeTerm"/></td>
        </tr>
        <tr>
          <td class="mods_label">Date Published</td>
          <td class="mods_value"><xsl:value-of select="mods:dateIssued"/></td>
        </tr>
      </table>
    </td>
  </tr>
</xsl:template>

<xsl:template match="text()"/>

</xsl:stylesheet>
