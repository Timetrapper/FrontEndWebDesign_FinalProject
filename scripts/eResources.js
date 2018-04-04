$(document).ready(function () {
  $('#tree').tree({
    uiLibrary: 'bootstrap4',
    dataSource: [{
        text: 'Official Links',
        children: [{
          text: "<a target='_blank' title='Main page from BCIT's School of Computing and Academic Studies' href='https://www.bcit.ca/study/programs/699ccertt'>BCIT SSD Homepage</a>",
        }, {
          text: "<a target='_blank' title='Fillable printable application PDF' href='https://www.bcit.ca/files/cas/htp/pdf/ssd_personal.pdf'>SSD Program Application</a>",
        }, {
          text: "<a target='_blank' title='Fillable printable pre-entry assessment PDF' href='https://www.bcit.ca/files/cas/htp/pdf/htp-7_a_ssd_pre-entry.pdf'>Pre-Entry Assessment</a>",
        }, {
          text: "<a target='_blank' title='2014-2016 SSD graduation employment outcome survey' href='https://www.bcit.ca/files/ir/gp/699ccertt.pdf'>SSD Graduation Survey</a>",
        }]
      },
      {
        text: 'Discussion',
        children: [{
          text: "<a target='_blank' title='Reddit feed from Feb-2018 discussing the merits of each program.' href='https://www.reddit.com/r/BCIT/comments/7olch3/cst_vs_ssd/?st=jflixxsq&sh=8945c0af'>CST vs. SSD</a>",
        }, {
          text: "<a target='_blank' title='Reddit feed from Mar-2015 discussing how the college is seen among Vancouver's tech companies' href='https://www.reddit.com/r/BCIT/comments/7olch3/cst_vs_ssd/?st=jflixxsq&sh=8945c0af'>BCIT in the Eyes of Vancouver</a>",
        }, {
          text: "<a target='_blank' title='Website from Apr-2015 discussing Vancouver among the seven best places to study web development in North America' href='http://designpotato.com/7-best-institutes-to-study-web-development-in-north-america/'>Where to study in North America</a>",
        }]
      },
      {
        text: 'Technical Resources',
        children: [{
          text: "<a target='_blank' title='Carefully curated collection of material from many sources, including Google, that you can use to supplement your classwork or direct your own learning' href='https://techdevguide.withgoogle.com/'>Google’s Guide to Technical Development</a>",
        }]
      },
      {
        text: 'Development Platforms',
        children: [{
          text: "<a target='_blank' title='Develop for the Google suite - online advertising technologies, search engine, cloud computing, software, and hardware' href='https://developers.google.com/'>Google Developers</a>",
        }, {
          text: "<a target='_blank' title='With everything you need to create amazing apps for Apple platforms' href='https://developer.apple.com/xcode/'>Xcode - Apple Developer</a>",
        }]
      }
    ],
    width: '100%'
  });
});