import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {SkillsHomeComponent} from './skills-home/skills-home.component';
import {SkillsListComponent} from './skills-list/skills-list.component';
import {SKILLS} from '../../data/skills.data';


const routes: Routes = [
  {
    path: '',
    redirectTo: 'languages',
    pathMatch: 'full'
  },
  {
    path: ':id',
    component: SkillsHomeComponent,
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SkillsRoutingModule { }
