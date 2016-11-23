[{include file="headitem.tpl" title="OMCGENERATOR_TITLE"|oxmultilangassign}]

<h1>[{oxmultilang ident='OMCGENERATOR_TITLE'}]</h1>

<p>[{oxmultilang ident='OMCGENERATOR_INFO'}]</p>

<table>
	<tr>
		<td valign="top">
			<form name="diagnosticsForm" id="diagnosticsForm" action="[{ $oViewConf->getSelfLink() }]" onsubmit="handleSubmit()" method="post">
				<table border="0" cellpadding="0">
					[{$oViewConf->getHiddenSid()}]
					<input type="hidden" name="cl" value="omcgenerator_main">
					<input type="hidden" name="fnc" value="generateJsonFiles">

					<tr>
						<td><input type="text" id="default_vendor" name="omcgenerator_default_vendor" value=""></td>
						<td><label for="default_vendor">[{ oxmultilang ident="OMCGENERATOR_DEFAULT_VENDOR"}]</label></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="omcgenerator_active_articles" name="omcgenerator_active_articles" value="1" checked></td>
						<td><label for="omcgenerator_active_articles">[{oxmultilang ident='OMCGENERATOR_ACTIVE_ARTICLES'}]</label></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="omcgenerator_download_articles" name="omcgenerator_download_articles" value="1" checked></td>
						<td><label for="omcgenerator_download_articles">[{oxmultilang ident='OMCGENERATOR_DOWNLOAD_ARTICLES'}]</label></td>
					</tr>
				</table>

				<br><br>
				<input type="submit" class="edittext" id="submitButton" name="submitButton" value="[{ oxmultilang ident="OMCGENERATOR_START"}]" >

			</form>

		</td>
	</tr>
	<tr>
		<td>
			<p>[{ oxmultilang ident="OMCGENERATOR_ADDITIONAL_INFO" }]</p>
			[{ oxmultilang ident="OMCGENERATOR_ADDITIONAL_INFO_ATTRIBUTES" }]
		</td>
	</tr>
</table>



[{ if count($aGeneratedFiles) > 0}]
	<h2>[{oxmultilang ident="OMCGENERATOR_FILES"}]</h2>
	[{foreach from=$aGeneratedFiles key=sFilename item=sFileLink}]
		<a target="_blank" href="[{$sFileLink}]" title="[{$sFilename}]">[{$sFilename}]</a><br>
	[{/foreach}]
[{ /if}]

[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]