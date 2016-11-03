<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

	<HTML>
	<BODY>

	<Table border="1">

	<thead>
		<tr>
			<th>Dificultad</th>
			<th>Tema</th>
			<th>Pregunta</th>
			<th>Respuesta</th>
		</tr>
	</thead>

	<xsl:for-each select="/assessmentItems/assessmentItem">
		<tr>
			<td><Font size="2" color="red" face="verdana">
			<xsl:value-of select="@complexity"/> <BR/>
			</Font></td>
			<td><Font size="2" color="green" face="verdana">
			<xsl:value-of select="@subject"/> <BR/>
			</Font></td>

			<td><Font size="2" color="blue" face="verdana">
			<xsl:value-of select="itemBody/p"/> <BR/>
			</Font></td>

			<td><Font size="2" color="black" face="verdana">
			<xsl:value-of select="correctResponse/value"/> <BR/>
			</Font></td>
			</tr>
	</xsl:for-each>

	</Table>

	</BODY>
	</HTML>
</xsl:template>
</xsl:stylesheet>