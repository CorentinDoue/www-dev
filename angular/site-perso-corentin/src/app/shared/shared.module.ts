import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { MatButtonModule } from '@angular/material/button';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatMenuModule } from '@angular/material/menu';
import { MatSelectModule } from '@angular/material/select';
import { MatTabsModule } from '@angular/material/tabs';
import { MatInputModule } from '@angular/material/input';
import { MatProgressSpinnerModule } from '@angular/material/progress-spinner';
import { MatChipsModule } from '@angular/material/chips';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatCheckboxModule } from '@angular/material/checkbox';
import { MatCardModule } from '@angular/material/card';
import { MatListModule } from '@angular/material/list';
import { MatIconModule } from '@angular/material/icon';
import { MatTooltipModule } from '@angular/material/tooltip';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { MatSlideToggleModule } from '@angular/material/slide-toggle';
import {AngularFontAwesomeModule} from 'angular-font-awesome';
import { AngularSvgIconModule } from 'angular-svg-icon';
import {HttpClientModule} from '@angular/common/http';
import {MatExpansionModule} from '@angular/material';

import {IterObjPipe} from './pipes/iter-obj.pipe';
import {EscapeHtmlPipe} from './pipes/escape-html.pipe';
import {SafePipe} from './pipes/safe.pipe';


@NgModule({
  imports: [
    CommonModule,
    FormsModule,

    MatButtonModule,
    MatToolbarModule,
    MatSelectModule,
    MatTabsModule,
    MatInputModule,
    MatProgressSpinnerModule,
    MatChipsModule,
    MatCardModule,
    MatSidenavModule,
    MatCheckboxModule,
    MatListModule,
    MatMenuModule,
    MatIconModule,
    MatTooltipModule,
    MatSnackBarModule,
    MatSlideToggleModule,
    MatExpansionModule,

    AngularFontAwesomeModule,
    AngularSvgIconModule,
    HttpClientModule
  ],
  declarations: [IterObjPipe, EscapeHtmlPipe, SafePipe],
  exports: [
    CommonModule,
    FormsModule,

    MatButtonModule,
    MatMenuModule,
    MatTabsModule,
    MatChipsModule,
    MatInputModule,
    MatProgressSpinnerModule,
    MatCheckboxModule,
    MatCardModule,
    MatSidenavModule,
    MatListModule,
    MatSelectModule,
    MatToolbarModule,
    MatIconModule,
    MatTooltipModule,
    MatSnackBarModule,
    MatSlideToggleModule,
    MatExpansionModule,

    AngularFontAwesomeModule,
    AngularSvgIconModule,
    HttpClientModule,

    IterObjPipe,
    EscapeHtmlPipe,
    SafePipe
  ]
})
export class SharedModule {}
