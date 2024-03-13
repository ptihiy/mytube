import Dashboard from '@/components/admin/Dashboard.vue';
import Todo from '@/components/admin/Todo.vue';
import Topics from '@/components/admin/Topics.vue';
import Channels from '@/components/admin/Channels.vue';
import Channel from '@/components/admin/channels/show.vue'
import AddChannel from '@/components/admin/channels/add.vue'

import Videos from '@/components/admin/videos/index.vue';
import AddVideo from '@/components/admin/videos/add.vue';
import Video from '@/components/admin/videos/show.vue';

import VideoLists from '@/components/admin/video-lists/index.vue';
import AddVideoList from '@/components/admin/video-lists/add.vue';
import VideoList from '@/components/admin/video-lists/show.vue';

import Tags from '@/components/admin/tags/index.vue';
import AddTag from '@/components/admin/tags/add.vue';
import Tag from '@/components/admin/tags/show.vue';

const routes = [
  { path: '/admin/', component: Dashboard, name: 'Dashboard' },
  { path: '/admin/todo', component: Todo, name: 'Todo' },
  { path: '/admin/topics', component: Topics, name: 'Topics' },

  { path: '/admin/channels', component: Channels, name: 'Channels' },
  { path: '/admin/channels/add', component: AddChannel, name: 'AddChannel' },
  { path: '/admin/channels/:id', component: Channel, name: 'Channel' },

  // Видео
  { path: '/admin/videos', component: Videos, name: 'Videos' },
  { path: '/admin/videos/add', component: AddVideo, name: 'AddVideo' },
  { path: '/admin/videos/:id', component: Video, name: 'Video' },

  // Списки видео
  { path: '/admin/video-lists', component: VideoLists, name: 'VideoLists' },
  { path: '/admin/videos-lists/add', component: AddVideoList, name: 'AddVideoList' },
  { path: '/admin/videos-lists/:id', component: VideoList, name: 'VideoList' },

  // Тематики
  { path: '/admin/tags', component: Tags, name: 'Tags' },
  { path: '/admin/tags/add', component: AddTag, name: 'AddTag' },
  { path: '/admin/tags/:id', component: Tag, name: 'Tag' },
]

export default routes;
