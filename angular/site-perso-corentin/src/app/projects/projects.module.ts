import { NgModule } from '@angular/core';

import { ProjectsRoutingModule } from './projects-routing.module';
import { ProjectsHomeComponent } from './projects-home/projects-home.component';
import {SharedModule} from '../shared/shared.module';
import { ProjectComponent } from './project/project.component';

@NgModule({
  imports: [
    SharedModule,
    ProjectsRoutingModule,
  ],
  declarations: [ProjectsHomeComponent, ProjectComponent]
})
export class ProjectsModule { }
