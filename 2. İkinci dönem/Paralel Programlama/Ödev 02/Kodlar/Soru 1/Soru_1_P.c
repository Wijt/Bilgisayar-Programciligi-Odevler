#include <stdio.h>
#include <time.h>
#include <sys/time.h>
#include <omp.h>

#define N_ROW 60
#define N_COL 80
#define N_SCALE 2


int a[N_ROW][N_COL];
int b[N_ROW*N_SCALE][N_COL*N_SCALE];


void MatrixPrint(int n_row, int n_col, int matrix[n_row][n_col]){
    for (int row = 0; row < n_row; row++)
    {
        for (int col = 0; col < n_col; col++)
        {
            printf("%d\t", matrix[row][col]);
        }
        printf("\n");
    }
    printf("\n");
}

int main(){
    struct timeval t;
    double vStart, vEnd;

    int counter = 0;

    for (int row = 0; row < N_ROW; row++)
    {
        for (int col = 0; col < N_COL; col++)
        {
            a[row][col] = counter++;
        }
    }
    
    gettimeofday(&t, NULL);
    vStart = t.tv_sec + t.tv_usec * 1.e-6;
    
    #pragma omp parallel for
    for (int row = 0; row < N_ROW*N_SCALE; row+=N_SCALE)
    {
        for (int col = 0; col < N_COL*N_SCALE; col+=N_SCALE)
        {
            int data = a[row/N_SCALE][col/N_SCALE];
            b[row][col] = data;         //TOP-LEFT CORNER
            b[row+1][col+1] = data;     //BOTTOM-RIGHT CORNER
            b[row][col+1] = data;       //TOP-RIGHT CORNER
            b[row+1][col] = data;       //BOTTOM-LEFT CORNER
        }
    }

    gettimeofday(&t, NULL);
    vEnd = t.tv_sec + t.tv_usec * 1.e-6;
        
    //MatrixPrint(N_ROW, N_COL, a);
    //MatrixPrint(N_ROW*N_SCALE, N_COL*N_SCALE, b);

    printf("Scale factor - Elapsed time:\t%d\t-\t%10.12lf\n", N_SCALE, vEnd - vStart);

    return 0;
}