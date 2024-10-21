<div 
    class="
        <% if $FullWidth %>container-fluid-wrapper<% else %>container-wrapper<% end_if %> $CSSClass <% if $NoGutters %>no-gutters<% end_if %>
        <% if $BackgroundImage %>bg-cover bg-no-repeat bg-center z-10 animate-zoomOut<% end_if %>
    "
    <% if $BackgroundImage %>style="background-image: url($BackgroundImage.URL)"<% end_if %>
>
     <% with $Elements %>
        $Me
    <% end_with %>
</div>
