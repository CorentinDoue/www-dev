import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import {NotFoundComponent} from './not-found/not-found.component';
import {HomeComponent} from './home/home.component';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'about',
    pathMatch: 'full'
  },
  {
    path: 'about',
    component: HomeComponent,
    data: { state: 'home' }
  },
  {
    path: 'cv',
    loadChildren: './cv/cv.module#CvModule',
    data: { state: 'cv' }
  },
  {
    path: 'skills',
    loadChildren: './skills/skills.module#SkillsModule',
    data: { state: 'skills' }
  },
  {
    path: 'projects',
    loadChildren: './projects/projects.module#ProjectsModule',
    data: { state: 'projects' }
  },
  {
    path: 'hobbies',
    loadChildren: './hobbies/hobbies.module#HobbiesModule',
    data: { state: 'hobbies' }
  },
  {
    path: '**',
    component: NotFoundComponent,
    data: { state: '404' }
  }
];

@NgModule({
  // useHash supports github.io demo page, remove in your app
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
