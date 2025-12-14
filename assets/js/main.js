// Main JavaScript file

document.addEventListener('DOMContentLoaded', function() {
    // Fade-in animation pour les blocs objectifs
    function fadeInOnScroll(element) {
        var rect = element.getBoundingClientRect();
        var windowHeight = (window.innerHeight || document.documentElement.clientHeight);
        if (rect.top <= windowHeight - 60) {
            element.classList.add('fadein-visible');
        }
    }
    var fadeBlocks = document.querySelectorAll('.fadein-block');
    function checkFadeBlocks() {
        fadeBlocks.forEach(function(block) {
            fadeInOnScroll(block);
        });
    }
    window.addEventListener('scroll', checkFadeBlocks);
    checkFadeBlocks();

    // Ombre colorée sur la carte graphique/légende selon l'humeur dominante (simple)
    var chartCard = document.getElementById('chartLegendContainer');
    var domEmotion = document.getElementById('dominant-emotion');
    if (chartCard && domEmotion) {
        setTimeout(function() {
            var colorSpan = domEmotion.querySelector('span');
            if (colorSpan) {
                var color = window.getComputedStyle(colorSpan).color;
                if (color) {
                    chartCard.style.boxShadow = '0 8px 32px 0 ' + color.replace(')', ', 0.35)').replace('rgb', 'rgba');
                }
            }
        }, 350);
    }

    // Ombre colorée sous le titre selon l'humeur dominante (page résultats)

});
