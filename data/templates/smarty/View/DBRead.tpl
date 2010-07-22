Data in DB:<br />
{foreach from=$arData item=row}
{foreach from=$row key=key item=value}
{$key} = {$value}<br />
{/foreach}
{/foreach}