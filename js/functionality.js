/**
 *  @template       fomantic based 605 template
 *  @version        see info.php of this template
 *  @author         Gerard Smelt
 *  @copyright      2014-2019 ContractHulp
 *  @license        http://creativecommons.org/licenses/by/3.0/
 *  @license terms  see info.php of this template
 *  @platform       see info.php of this template
 */

$(document) .ready(function() {
  // fix menu when passed
  $('.masthead').visibility({
    once: false,
    onBottomPassed: function() { $('.fixed.menu').transition('fade in');},
    onBottomPassedReverse: function() {$('.fixed.menu').transition('fade out');}
    });
  // create sidebar and attach to menu open
  $('.ui.sidebar') .sidebar('attach events', '.toc.item');
    // activate accordion
  $('.ui.accordion').accordion() ;
  $('.ui.sticky').sticky({ context: '#kleefaan1',
    pushing: true }); 
  });
