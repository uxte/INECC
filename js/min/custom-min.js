function showElements(e,t){var n=e.innerHTML,s=t.querySelectorAll(".block");e.classList.contains("active")?(s.forEach(function(e){e.classList.contains("show")||e.classList.add("hide")}),e.innerHTML=n.replace("less","more")):(s.forEach(function(e){e.classList.remove("hide")}),e.innerHTML=n.replace("more","less")),e.classList.toggle("active"),event.preventDefault()}function bindSeeMoreButtons(){function e(){return function(){showElements(this,this.parentNode.parentNode)}}for(var t=document.getElementsByClassName("button see-more"),n=0;n<t.length;n++)t[n].addEventListener("click",e(n))}function prevNext(e,t){for(var n=e.getElementsByClassName("slide"),s=0;s<n.length;s++)n[s].classList.add("hide");"prev"===t?0>=slideIndex?slideIndex=n.length-1:slideIndex-=1:"next"===t&&(slideIndex>=n.length-1?slideIndex=0:slideIndex+=1),n[slideIndex].classList.remove("hide"),event.preventDefault()}function startSlider(e){function t(){return function(){prevNext(e,this.attributes.rel.value)}}if(e=document.getElementById(e),"undefined"!=typeof e&&null!==e)for(var n=e.getElementsByClassName("prev-next")[0].getElementsByTagName("A"),s=0;s<n.length;s++)n[s].addEventListener("click",t(s))}function openDropDown(e){e.classList.contains("active")?e.classList.remove("active"):e.classList.add("active")}function startDropdown(e){function t(){return function(){openDropDown(this.closest(".block"))}}if(e=document.getElementById(e),"undefined"!=typeof e&&null!==e)for(var n=e.getElementsByClassName("block-header"),s=0;s<n.length;s++)n[s].addEventListener("click",t(s))}bindSeeMoreButtons();var slideIndex=0;startSlider("events"),startSlider("testimonials"),startSlider("our-history"),startDropdown("faq");