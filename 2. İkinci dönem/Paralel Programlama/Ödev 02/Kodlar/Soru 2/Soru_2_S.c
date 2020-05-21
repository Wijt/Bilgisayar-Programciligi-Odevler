#include <stdio.h>
#include <time.h>
#include <sys/time.h>

#define N 100

int a[N][N];
int b[N][N];
int c[N][N];

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

    int counter = 1;

    for (int row = 0; row < N; row++)
    {
        for (int col = 0; col < N; col++)
        {
            a[row][col] = counter++;
            b[row][col] = 2;
        }
    }

    gettimeofday(&t, NULL);
    vStart = t.tv_sec + t.tv_usec * 1.e-6;

    for (int row = 0; row < N; row++)
    {
        for (int col = 0; col < N; col++)
        {
            int sum = 0;
            for (int walker = 0; walker < N; walker++)
            {
                sum += a[row][walker] * b[walker][col];
            }
            c[row][col] = sum;
        }
    }

    gettimeofday(&t, NULL);
    vEnd = t.tv_sec + t.tv_usec * 1.e-6;
      
    //MatrixPrint(N, N, a);
    //MatrixPrint(N, N, b);
    //MatrixPrint(N, N, c);

    printf("Elapsed time for matrix multiplication:\t%10.12lf\n", vEnd - vStart);
    return 0;
}
