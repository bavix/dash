import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

import {library} from '@fortawesome/fontawesome-svg-core'
import {faGitlab, faLinux} from '@fortawesome/free-brands-svg-icons'
import {faCircle, faLink, faUndoAlt} from '@fortawesome/pro-solid-svg-icons'
import {
    faChartBar,
    faCloudDownloadAlt,
    faDownload,
    faHdd,
    faRocket,
    faTerminal,
    faUserShield,
    faVideo,
    faWifi
} from '@fortawesome/pro-light-svg-icons'

library.add(faLinux);
library.add(faGitlab);
library.add(faChartBar);
library.add(faHdd);
library.add(faTerminal);
library.add(faCircle);
library.add(faVideo);
library.add(faRocket);
library.add(faCloudDownloadAlt);
library.add(faWifi);
library.add(faDownload);
library.add(faUserShield);
library.add(faUndoAlt);
library.add(faLink);

export default FontAwesomeIcon;
