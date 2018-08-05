import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import {HobbiesComponent} from './hobbies/hobbies.component';
import {SkillsHomeComponent} from '../skills/skills-home/skills-home.component';


const routes: Routes = [
  {
    path: '',
    component: HobbiesComponent
  },
  {
    path: ':id',
    component: HobbiesComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HobbiesRoutingModule {}
