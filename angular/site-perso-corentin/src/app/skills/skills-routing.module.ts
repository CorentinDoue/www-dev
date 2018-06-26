import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {SkillsHomeComponent} from './skills-home/skills-home.component';


const routes: Routes = [
  {
    path: '',
    component: SkillsHomeComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SkillsRoutingModule { }
