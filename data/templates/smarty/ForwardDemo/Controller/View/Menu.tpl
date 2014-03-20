<ul>
{foreach from=$arMenu key=strName item=strController}
{if $strName eq $strProcessScreen}
<li>{$strName}</li>
{else}
<li><a href="?SimpleFormDemo[screen]={$strName}">{$strName}</a></li>
{/if}
{/foreach}
</ul>