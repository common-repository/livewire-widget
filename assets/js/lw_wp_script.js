var iframe_desktop = document.createElement('iframe');
    
iframe_desktop.src = 'https://livewire.live/static/widgets/widget_desktop.html';
iframe_desktop.setAttribute('frameBorder','0');
iframe_desktop.setAttribute('allowfullscreen','');
iframe_desktop.id = "livewire_desktop_widget";
iframe_desktop.classList.add('desktop'); 
iframe_desktop.classList.add('widget-desktop');


document.body.appendChild(iframe_desktop);



var iframe_mobile = document.createElement('iframe');
    
iframe_mobile.src = 'https://livewire.live/static/widgets/widget_mobile.html';
iframe_mobile.setAttribute('frameBorder','0');
iframe_mobile.setAttribute('allowfullscreen','');
iframe_mobile.id = "livewire_mobile_widget";
iframe_mobile.classList.add('mobile'); 
iframe_mobile.classList.add('widget-mobile');

document.body.appendChild(iframe_mobile);
